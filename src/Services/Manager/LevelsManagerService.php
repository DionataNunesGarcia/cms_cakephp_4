<?php

namespace App\Services\Manager;

use App\Services\DefaultService;
use Cake\Controller\Controller;
use Cake\ORM\Entity;

class LevelsManagerService extends DefaultService
{
    /**
     * @param Controller $controller
     */
    public function __construct(Controller $controller)
    {
        $this->setModel('Levels');
        parent::__construct($controller);
    }

    public function saveEntity()
    {
        $entity = $this->_controller
            ->{$this->getModel()}
            ->patchEntity($this->getEntity(), $this->_request->getData());
        try {
            if ($this->_controller->{$this->getModel()}->save($entity)) {
                return $entity;
            }
            debug($entity);
        } catch (\Exception $ex) {
            debug($entity);
            $this->renderizaErro($entity);
        }
        die;
    }

    public function delete($ids)
    {
        if (empty($ids)) {
            $this->_controller->Flash->error('Nenhum registro foi selecionado.');
            return $this->_controller->redirect($this->_controller->referer());
        }

        $entidades = $this->_controller->ContasReceber
            ->find()
            ->where([
                'id IN'  => $ids,
            ])
            ->combine('id', 'nome');

        $resultado = $this->_controller->ContasReceber->excluir($ids);
        if (!$resultado) {
            throw new \Exception("Erro ao deletar o(s) titulo(s).", HttpStatusCodeHelper::BAD_REQUEST);
        }
        return [
            'entidades' => $entidades,
            'resultado' => $resultado
        ];
    }

    /**
     * @param Entity $entidade
     * @return void
     */
    public function renderizaErro(Entity $entity)
    {
        $this->_controller->Flash->error('Falha ao salvar o Usuário. Verifique se você preencheu todos os campos corretamente.');
        $this->_controller->set('entity', $entity);
    }
}
