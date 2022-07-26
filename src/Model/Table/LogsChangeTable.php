<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LogsChange Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\RecordsTable&\Cake\ORM\Association\BelongsTo $Records
 *
 * @method \App\Model\Entity\LogsChange newEmptyEntity()
 * @method \App\Model\Entity\LogsChange newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\LogsChange[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LogsChange get($primaryKey, $options = [])
 * @method \App\Model\Entity\LogsChange findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\LogsChange patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LogsChange[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\LogsChange|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LogsChange saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LogsChange[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\LogsChange[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\LogsChange[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\LogsChange[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LogsChangeTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('logs_change');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('user_id')
            ->requirePresence('user_id', 'create')
            ->notEmptyString('user_id');

        $validator
            ->scalar('table_name')
            ->maxLength('table_name', 45)
            ->requirePresence('table_name', 'create')
            ->notEmptyString('table_name');

        $validator
            ->integer('record_id')
            ->notEmptyString('record_id');

        $validator
            ->scalar('action_type')
            ->maxLength('action_type', 45)
            ->requirePresence('action_type', 'create')
            ->notEmptyString('action_type');

        $validator
            ->scalar('new_value')
            ->maxLength('new_value', 4294967295)
            ->requirePresence('new_value', 'create')
            ->notEmptyString('new_value');

        $validator
            ->scalar('old_value')
            ->maxLength('old_value', 4294967295)
            ->requirePresence('old_value', 'create')
            ->notEmptyString('old_value');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }

    /**
     * @param int|null $id
     * @return \App\Model\Entity\LogsAcces
     */
    public function getEntity(int $id = null)
    {
        return $id ? $this->get($id, ['contain' => ['Users']]) : $this->newEntity([]);
    }
}
