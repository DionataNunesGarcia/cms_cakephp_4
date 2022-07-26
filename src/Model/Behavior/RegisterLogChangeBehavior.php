<?php
declare(strict_types=1);

namespace App\Model\Behavior;

use App\Model\Entity\LogsChange;
use App\Model\Entity\SystemParameter;
use App\Utils\Enum\LogsChangeTypesEnum;
use App\Utils\Enum\StatusEnum;
use Cake\Core\Configure;
use Cake\I18n\FrozenTime;
use Cake\ORM\Behavior;
use Cake\ORM\Entity;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

/**
 * RegisterLogChange behavior
 */
class RegisterLogChangeBehavior extends Behavior
{
    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected $_defaultConfig = [];

    /**
     * @var SystemParameter
     */
    private SystemParameter $systemParameter;

    /**
     * @var Entity
     */
    private Entity $entity;

    /**
     * @var Table
     */
    private Table $tableLogsChange;

    /**
     * @var array
     */
    private array $userLogged;

    /**
     * @param array $config
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->tableLogsChange = TableRegistry::getTableLocator()->get("LogsChange");
    }

    /**
     * @return Entity
     */
    public function getEntity(): Entity
    {
        return $this->entity;
    }

    /**
     * @param Entity $entity
     */
    public function setEntity(Entity $entity): void
    {
        $this->entity = $entity;
    }

    /**
     * afterSave
     * for INSERT,UPDATE
     *
     * @param \Cake\Event\Event $event
     * @param Entity $entity
     * @param $options
     * @return bool
     */
    public function afterSave(\Cake\Event\Event $event, Entity $entity, $options): bool
    {
        if (!$this->generateChangeLogIsValid() || !$this->checkUserSession()) {
            return false;
        }
        $this->setEntity($entity);
        //INSERT
        if ($this->getEntity()->isNew()) {
            return $this->saveInsert();
        }
        //UPDATE
        return $this->saveUpdate();
    }

    /**
     * @param \Cake\Event\Event $event
     * @param $entity
     * @param $options
     * @return bool
     */
    public function beforeDelete(\Cake\Event\Event $event, Entity $entity, $options): bool
    {
        if (!$this->generateChangeLogIsValid() || !$this->checkUserSession()) {
            return false;
        }
        $this->setEntity($entity);
        return $this->saveDelete();
    }

    /**
     * @return bool
     */
    private function generateChangeLogIsValid() :bool
    {
        $systemParametersTable = $this->_table->getTable() == "system_parameters"
            ? $this->_table
            : TableRegistry::getTableLocator()->get("SystemParameters");
        $systemParameter = $systemParametersTable->getEntity();
        if (!$systemParameter->generate_change_log) {
            return false;
        }
        return true;
    }

    /**
     * @return bool
     */
    private function checkUserSession() :bool
    {
        if (empty(Configure::check('SessionUser'))) {
            return false;
        }
        $this->userLogged = Configure::read('SessionUser');
        return true;
    }

    /**
     * @return bool
     */
    private function saveInsert() :bool
    {
        $newValues = [];
        $modifyValues = $this->getEntity()
            ->getDirty();
        $type = LogsChangeTypesEnum::CREATE;
        foreach ($modifyValues as $field) {
            if (in_array($field, $this::ignoreFields())) {
                continue;
            }
            $newValues[$field] = $this->getEntity()->{$field};
        }
        return $this->saveEntityLog($type, $newValues, []);
    }

    /**
     * @return bool
     */
    private function saveUpdate() :bool
    {
        //New data for updated fields only
        $modifyValues = $this->getEntity()
            ->getDirty();
        //If nothing has been updated
        if (count($modifyValues) == 0) {
            return true;
        }
        $newValues = [];
        $oldValues = [];
        foreach ($modifyValues as $field) {
            if (in_array($field, $this::ignoreFields())) {
                continue;
            }
            $oldValues[$field] = $this->getEntity()->getOriginal($field);
            $newValues[$field] = $this->getEntity()->{$field};
        }
        $type = LogsChangeTypesEnum::UPDATE;
        // verify if status is DELETE
        if (isset($newValues['status']) && $newValues['status'] == StatusEnum::EXCLUDED) {
            return $this->saveDelete();
        }
        return $this->saveEntityLog($type, $newValues, $oldValues);
    }

    /**
     * @return bool
     */
    private function saveDelete() :bool
    {
        $type = LogsChangeTypesEnum::DELETE;
        return $this->saveEntityLog($type, [], $this->buildOldValues());
    }

    /**
     * @param string $type
     * @param array $newValues
     * @param array $oldValues
     * @return bool
     */
    private function saveEntityLog(string $type, array $newValues = [], array $oldValues = []) :bool
    {
        /**
         * @var LogsChange $logEntity
         */
        $logEntity = $this->tableLogsChange->newEmptyEntity();
        ksort($oldValues);
        ksort($newValues);
        $logEntity->user_id = $this->userLogged['id'];
        $logEntity->table_name = $this->_table->getAlias();
        $logEntity->record_id = $this->getEntity()->id;
        $logEntity->action_type = $type;
        $logEntity->old_value = json_encode($oldValues);
        $logEntity->new_value = json_encode($newValues);
        $logEntity->created = FrozenTime::now();

        if (!$this->tableLogsChange->save($logEntity)) {
            return false;
        }
        return true;
    }

    /**
     * @return string[]
     */
    private static function ignoreFields() :array
    {
        return [
            'password',
            'super',
            'deletable',
        ];
    }

    /**
     * @return array
     */
    private function buildOldValues() :array
    {
        $oldValues = [];
        foreach ($this->getEntity()->toArray() as $field => $value) {
            if (is_array($field) || in_array($field, $this::ignoreFields())) {
                continue;
            }
            $oldValues[$field] = $value;
        }
        if (isset($oldValues['status'])) {
            unset($oldValues['status']);
        }
        return $oldValues;
    }
}
