<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LevelsPermissions Model
 *
 * @property \App\Model\Table\LevelsTable&\Cake\ORM\Association\BelongsTo $Levels
 *
 * @method \App\Model\Entity\LevelsPermission newEmptyEntity()
 * @method \App\Model\Entity\LevelsPermission newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\LevelsPermission[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LevelsPermission get($primaryKey, $options = [])
 * @method \App\Model\Entity\LevelsPermission findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\LevelsPermission patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LevelsPermission[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\LevelsPermission|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LevelsPermission saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LevelsPermission[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\LevelsPermission[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\LevelsPermission[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\LevelsPermission[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class LevelsPermissionsTable extends Table
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

        $this->setTable('levels_permissions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Levels', [
            'foreignKey' => 'level_id',
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
            ->integer('level_id')
            ->notEmptyString('level_id');

        $validator
            ->scalar('prefix')
            ->maxLength('prefix', 150)
            ->requirePresence('prefix', 'create')
            ->notEmptyString('prefix');

        $validator
            ->scalar('controller')
            ->maxLength('controller', 150)
            ->requirePresence('controller', 'create')
            ->notEmptyString('controller');

        $validator
            ->scalar('action')
            ->maxLength('action', 150)
            ->requirePresence('action', 'create')
            ->notEmptyString('action');

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
        $rules->add($rules->existsIn('level_id', 'Levels'), ['errorField' => 'level_id']);

        return $rules;
    }
}
