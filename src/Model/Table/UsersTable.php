<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\Datasource\EntityInterface;
use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\LevelsTable&\Cake\ORM\Association\BelongsTo $Levels
 * @property \App\Model\Table\LogsAccessTable&\Cake\ORM\Association\HasMany $LogsAccess
 * @property \App\Model\Table\LogsChangeTable&\Cake\ORM\Association\HasMany $LogsChange
 * @property \App\Model\Table\UploadsTable&\Cake\ORM\Association\HasMany $Uploads
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Levels', [
            'foreignKey' => 'level_id',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('Avatar', [
            'className' => 'Uploads',
            'foreignKey' => 'id',
            'joinType' => 'LEFT',
            'conditions' => [
                'Avatar.model' => 'Users',
            ],
        ]);

        $this->belongsTo('Situation', [
            'className' => 'Status',
            'foreignKey' => 'status'
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
            ->scalar('user')
            ->maxLength('user', 60)
            ->requirePresence('user', 'create')
            ->notEmptyString('user');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create');

        $validator
            ->boolean('super')
            ->notEmptyString('super');

        $validator
            ->integer('level_id')
            ->notEmptyString('level_id');

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
        $rules->add($rules->isUnique(['user'],
            'Esse Usuário já estão sendo usado.'
        ));
        $rules->add($rules->existsIn('level_id', 'Levels'), ['errorField' => 'level_id']);

        return $rules;
    }

    public function beforeMarshal(Event $event, \ArrayObject $data, \ArrayObject $options)
    {
        if (!empty($data['id']) && empty($data['password'])) {
            unset($data['password']);
        }
    }

    /**
     * @param int|null $id
     * @return User
     */
    public function getEntity(int $id = null) :User
    {
        if ($id) {
            return $this
                ->get($id, [
                    'contain' => [
                        "Levels",
                        "Avatar"
                    ]
                ]);
        }
        return $this->newEntity([]);
    }
}
