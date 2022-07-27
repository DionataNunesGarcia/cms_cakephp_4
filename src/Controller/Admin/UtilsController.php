<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
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
    public function cropImageAjax()
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
     * @return void
     */
    public function deleteFile()
    {

    }
}
