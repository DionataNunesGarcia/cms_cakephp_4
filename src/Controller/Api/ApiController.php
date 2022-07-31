<?php
declare(strict_types=1);

namespace App\Controller\Api;

use App\Controller\AppController;
use App\Services\Form\UsersFormService;
use Cake\Http\Exception\UnauthorizedException;
use App\Model\Entity\User;
use Cake\Http\Response;
use Cake\Utility\Security;
use Firebase\JWT\JWT;

/**
 * Api Controller
 *
 */
class ApiController extends AppController
{
    /**
     *
     */
    const TOKEN_HOUR_LIVE = (HOUR * 2);

    /**
     * @var UsersFormService $_usersFormService
     */
    private UsersFormService $_usersFormService;

    /**
     * @return void
     * @throws \Exception
     */
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Security');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Authentication.Authentication', [
            'requireIdentity' => true
        ]);
        $this->_usersFormService = new UsersFormService($this);
    }

    /**
     * @inheritDoc
     */
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions([
            'login'
        ]);
        $this->Security->setConfig('validatePost', false);
    }

    /**
     * Retornar uma resposta com dados e tipo json
     * @param array $json
     * @param int $code
     * @return \Cake\Http\Response
     */
    protected function responseJson(array $json, int $code = 200)
    {
        return $this->response
            ->withStatus($code)
            ->withType('application/json')
            ->withStringBody(json_encode($json));
    }

    /**
     * Login method
     * Login user and generate a jwt
     * @return void
     */
    public function login() :Response
    {
        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
            /** @var User $entity */
            $entity = $this->_usersFormService->buildUserLogged($result->getData()->id);
            $expireTime = time() + self::TOKEN_HOUR_LIVE;
            $tokenJwt = JWT::encode([
                'sub' => $entity->id,
                'exp' => $expireTime
            ],Security::getSalt());

            return $this->responseJson([
                'token_type' => 'bearer',
                'token' => $tokenJwt,
                'token_expire' => $expireTime,
                'data' => $entity
            ]);
        }
        $this->response = $this->response
            ->withStatus(401)
            ->withStringBody('Authentication needed!');
        return $this->response;
    }
}
