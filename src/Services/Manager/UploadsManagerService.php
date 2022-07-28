<?php

namespace App\Services\Manager;

use App\Error\Exception\ValidationErrorException;
use App\Services\DefaultService;
use Cake\Controller\Controller;
use Cake\I18n\FrozenTime;
use Laminas\Diactoros\UploadedFile;

class UploadsManagerService extends DefaultService
{
    /**
     * @param Controller $controller
     */
    public function __construct(Controller $controller)
    {
        $this->setModel('Uploads');
        parent::__construct($controller);
    }

    /**
     * @param UploadedFile $file
     * @param int $foreignKey
     * @param string $model
     * @return array
     */
    public function saveFile(UploadedFile $file, int $foreignKey, string $model) :array
    {
        if ($file->getError()) {
            return $this->response;
        }
        $entity = $this->__table->newEmptyEntity();

        $entity->filename = $file;
        $entity->foreign_key = $foreignKey;
        $entity->model = $model;
        $entity->type = $file->getClientMediaType();
        $entity->order_files = 1;
        $entity->user_id = $this->_userSession['id'];
        $entity->extension = pathinfo($file->getClientFilename(), PATHINFO_EXTENSION);
        $entity->alt = pathinfo($file->getClientFilename(), PATHINFO_BASENAME);
        $entity->description = '';
        $entity->created = FrozenTime::now();
        $entity->modified = FrozenTime::now();

        if (!$this->__table->save($entity)) {
            throw new ValidationErrorException($entity);
        }
        $this->response['data'] = $entity;
        return $this->response;
    }

    /**
     * @param $image
     * @return false|string
     */
    public function saveTemporaryFile($image)
    {
        $img = str_replace('data:image/png;base64,', '', $image);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $imageName = tempnam(sys_get_temp_dir(), 'upload');
        file_put_contents( $imageName, $data);
        move_uploaded_file($imageName, $imageName);
        return $imageName;
    }

    public function removeUploads(string $foreignKeysStr, string $model) :array
    {
        $foreignKeys = explode(',', $foreignKeysStr);
        foreach ($foreignKeys as $foreignKey) {
            $entity = $this->__table
                ->find()
                ->where([
                    'foreign_key' => $foreignKey,
                    'model' => $model,
                ])
                ->first();

            if (!$entity) {
                throw new ValidationErrorException(
                    $entity,
                    "Não foi encontrado o upload e por isso não pode ser deletado"
                );
            }
            $filePath = WWW_ROOT . "Uploads" . DS . $entity->filename;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            if (!$this->__table->delete($entity)) {
                throw new ValidationErrorException($entity, 'Erro ao deletar o upload.');
            }
        }
        return $this->response;
    }
}
