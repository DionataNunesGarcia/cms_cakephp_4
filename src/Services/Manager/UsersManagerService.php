<?php

namespace App\Services\Manager;

use App\Error\Exception\ValidationErrorException;
use App\Model\Entity\SystemParameter;
use App\Model\Entity\User;
use App\Services\DefaultService;
use App\Utils\Enum\HttpStatusCodeEnum;
use App\Utils\Enum\StatusEnum;
use App\Utils\Generate;
use Cake\Controller\Controller;
use Cake\Core\Configure;
use Cake\I18n\FrozenTime;
use Cake\I18n\Time;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

class UsersManagerService extends DefaultService
{
    /**
     * @param Controller $controller
     */
    public function __construct(Controller $controller)
    {
        $this->setModel('Users');
        parent::__construct($controller);
    }

    /**
     * @return array
     */
    public function saveEntity() :array
    {
        $entity = $this->__table
            ->patchEntity($this->getEntity(), $this->_request->getData());

        if (!$this->__table->save($entity)) {
            throw new ValidationErrorException($entity);
        }
        $uploadsManagerService = new UploadsManagerService($this->_controller);
        $uploadsManagerService->saveFile(
            $this->_request->getData('upload.file'),
            $entity->id,
            $this->getModel()
        );

        $this->response['data'] = $entity;
        return $this->response;
    }

    /**
     * @param string $ids
     * @return array
     * @throws \Exception
     */
    public function deletedEntities(string $ids)
    {
        $ids = explode(',', $ids);
        if (empty($ids)) {
            throw new \Exception("Nenhum registro foi selecionado", HttpStatusCodeEnum::BAD_REQUEST);
        }

        $entities = $this->__table
            ->find()
            ->where([
                'id IN'  => $ids,
            ])
            ->toArray();

        foreach ($entities as $entity) {
            $entity->status = StatusEnum::EXCLUDED;
            $entity->user = "#del-{$entity->id}#{$entity->user}";
            $entity->email = "#del-{$entity->id}#{$entity->email}";
            $entity->modified = FrozenTime::now();
            if (!$this->__table->save($entity)) {
                throw new ValidationErrorException($entity, "Erro ao deletar o Usuário {$entity->user}");
            }
        }
        $this->response['data'] = $entities;
        $this->response['status'] = HttpStatusCodeEnum::RESET_CONTENT;
        return $this->response;
    }

    /**
     * @param User $user
     * @return array
     */
    public function generateLog(User $user) :array
    {
        $this->saveLastAccess($user);
        /** @var SystemParameter $parameters */
        $parameters = self::getTableLocator('SystemParameters')
            ->getEntity();
        if (!$parameters->generate_access_logs) {
            return $this->response;
        }

        $table = TableRegistry::getTableLocator()->get("LogsAccess");
        $entity = $table->getEntity();

        $entity->user_id = $user->id;
        $entity->ip = $this->_request->clientIp();
        $entity->created = FrozenTime::now();

        if (!$table->save($entity)) {
            throw new ValidationErrorException($entity);
        }
        $this->response['data'] = $entity;
        return $this->response;
    }

    /**
     * @param User $user
     * @return array
     */
    public function saveLastAccess(User $user) :array
    {
        if (!$user->first_access) {
            $user->first_access = FrozenTime::now();
        }
        $user->last_access = FrozenTime::now();

        if (!self::getTableLocator('Users')->save($user)) {
            throw new ValidationErrorException($user);
        }
        $this->response['data'] = $user;
        return $this->response;
    }

    /**
     * @return array
     */
    public function forgetPassword() :array
    {
        $email = $this->_request->getData('email');
        $user = $this->getUserByEmail($email);

        $password = Generate::newPassword(12, false, true);
        $user->password = $password;
        $user->modified = FrozenTime::now();
        if (!$this->__table->save($user)) {
            throw new ValidationErrorException($user, 'Não foi possível gerar uma senha nova.');
        }
        $this->sendNewPassword($user, $password);
        return $this->response;
    }

    /**
     * @param string $email
     * @return User
     */
    private function getUserByEmail(string $email) :User
    {
        /** @var User $user */
        $user = $this->__table->find()
            ->where([
                'email' => trim($email)
            ])
            ->first();
        if (!$user) {
            throw new ValidationErrorException(null, "Usuário com o e-mail {$email} não foi encontrado");
        }
        if ($user->status != StatusEnum::ACTIVE) {
            throw new ValidationErrorException($user, "Você não tem permissão para trocar a senha, contate um administrador.");
        }
        return $user;
    }

    /**
     * @param User $user
     * @param string $password
     * @return void
     */
    private function sendNewPassword(User $user, string $password)
    {
        $client = Configure::read('Client');

        $url = Router::url(['controller' => 'Usuarios', 'action' => 'login'], true);

        $subject = $client['name'] . ' - Dados de Acesso ao Sistema.';

        $message = "Olá."
            . "<br/>"
            . "Os seus dados de acesso ao sistema com a nova senha:"
            . "<br/><br/>"
            . "Login: " . $user->user
            . "<br/>"
            . "Senha: " . $password
            . "<br/><br/>"
            . "Link de acesso: <a href='$url' target='_blank' >" . $client['name'] . "</a>"
            . "<br/><br/>"
            . "Ao acessar o sistema pela primeira vez, será necessário mudar a senha para sua segurança."
        ;
        $this->sendEmail($user->email, $subject, html_entity_decode($message));
    }
}
