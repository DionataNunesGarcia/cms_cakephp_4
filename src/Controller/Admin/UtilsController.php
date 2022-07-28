<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Error\Exception\ValidationErrorException;
use App\Services\Manager\UploadsManagerService;

/**
 * Utils Controller
 *
 * @method \App\Model\Entity\Util[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UtilsController extends AdminController
{
    /**
     * @return void
     */
    public function cropImageAjax() : void
    {
        $this->viewBuilder()->setLayout(null);

        if (empty($this->request->getQuery("image"))) {
            return;
        }
        $image = $this->request->getQuery("image");
        $formService = new UploadsManagerService($this);
        $imageName = $formService->saveTemporaryFile($image);

        $this->set([
            'imageName' => $imageName,
            'image' => $image
        ]);
        $this->render('/Admin/element/admin/image-crop');
    }

    /**
     * @param string $foreignKeys
     * @param string $model
     * @return void
     */
    public function removeUploads(string $foreignKeys, string $model)
    {
        $response = [];
        try {
            $managerService = new UploadsManagerService($this);
            $response = $managerService->removeUploads($foreignKeys, $model);
        } catch (ValidationErrorException $ex) {
            $code = $ex->getCode() != 0? $ex->getCode() : 403;
            $this->response = $this->response->withStatus($code);
            $response['message'] = $ex->getMessage();
        }
        if ($this->getRequest()->is('ajax')) {
            $this->RequestHandler->renderAs($this, 'json');
            $this->set(compact('response'));
            $this->set('_serialize', 'response');
        }
        if ($this->getRequest()->is('get')) {
            return $this->redirect($this->referer());
        }
    }
}
