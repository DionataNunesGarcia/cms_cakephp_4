<?php

namespace App\Error\Exception;

use Cake\Datasource\EntityInterface;
use Cake\Http\Exception\HttpException;

class ValidationErrorException extends HttpException
{
    protected $_validationErrors;

    protected ?EntityInterface $_entity;

    public function __construct(EntityInterface $entity = null, $message = null, $code = 422)
    {
        $this->setEntity($entity);
        $this->_validationErrors = $entity->getErrors();

        if ($message === null) {
            $message = __('Aconteceu um erro de validação.');
        }

        parent::__construct($message, $code);
    }

    public function getValidationErrors()
    {
        return $this->_validationErrors;
    }

    /**
     * @return EntityInterface
     */
    public function getEntity(): EntityInterface
    {
        return $this->_entity;
    }

    /**
     * @param ?EntityInterface $entity
     */
    public function setEntity(?EntityInterface $entity = null): void
    {
        $this->_entity = $entity;
    }
}
