<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\Level;
use App\Model\Entity\User;
use App\Utils\Enum\StatusEnum;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Levels Model
 *
 * @property \App\Model\Table\LevelsPermissionsTable&\Cake\ORM\Association\HasMany $LevelsPermissions
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\Level newEmptyEntity()
 * @method \App\Model\Entity\Level newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Level[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Level get($primaryKey, $options = [])
 * @method \App\Model\Entity\Level findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Level patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Level[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Level|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Level saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Level[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Level[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Level[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Level[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LevelsTable extends Table
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

        $this->setTable('levels');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->addBehavior('RegisterLogChange');

        $this->hasMany('LevelsPermissions', [
            'foreignKey' => 'level_id',
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'level_id',
            'conditions' => [
                'Users.status !=' => StatusEnum::EXCLUDED,
            ],
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
            ->scalar('name')
            ->maxLength('name', 60)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->boolean('deletable')
            ->notEmptyString('deletable');

        return $validator;
    }

    /**
     * @param int|null $id
     * @return Level
     */
    public function getEntity(int $id = null) :Level
    {
        if ($id) {
            $entity = $this
                ->get($id, [
                    'contain' => [
                        "LevelsPermissions",
                    ]
                ]);
            $entity->permissions = [];
            foreach ($entity->levels_permissions as $permission) {
                $entity->permissions[] = "{$permission->prefix}:{$permission->controller}:{$permission->action}";
            }
            return $entity;
        }
        return $this->newEntity(['permissions']);
    }
}
