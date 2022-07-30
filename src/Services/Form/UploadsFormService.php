<?php

namespace App\Services\Form;

use App\Services\DefaultService;
use App\Utils\Enum\StatusEnum;
use Cake\Controller\Controller;

class UploadsFormService extends DefaultService
{
    /**
     * @param Controller $controller
     */
    public function __construct(Controller $controller)
    {
        $this->setModel('Uploads');
        parent::__construct($controller);
    }

    public function listFiles(array $data) :?array
    {
        return $this->__table
            ->find()
            ->where([
                'foreign_key' => $data['foreign_key'],
                'model' => $data['model'],
            ])
            ->orderDesc('created')
            ->toArray();
    }
}
