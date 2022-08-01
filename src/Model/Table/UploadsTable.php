<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\Upload;
use App\Model\Entity\User;
use Cake\I18n\FrozenTime;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;

/**
 * Uploads Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Upload newEmptyEntity()
 * @method \App\Model\Entity\Upload newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Upload[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Upload get($primaryKey, $options = [])
 * @method \App\Model\Entity\Upload findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Upload patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Upload[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Upload|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Upload saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Upload[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Upload[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Upload[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Upload[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UploadsTable extends Table
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

        $this->setTable('uploads');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);

        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'filename' => [
                'path' => "webroot{DS}Uploads{DS}",
                'nameCallback' => function ($tableObj, $entity, $data, $field, $settings) {
                    //if the file exists, salt it with time()
                    $now = FrozenTime::now()->i18nFormat('yyyy-MM-dd-HH-mm-ss');
                    $uuid = Text::uuid();
                    return  "{$now}-{$entity->model}-{$entity->foreign_key}-{$uuid}.{$entity->extension}";
                },
                'deleteCallback' => function ($path, $entity, $field, $settings) {
                    return [
                        $path . DS . $entity->{$field},
                    ];
                },
                'keepFilesOnDelete' => false
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
            ->integer('foreign_key')
            ->allowEmptyString('foreign_key');

        $validator
            ->scalar('model')
            ->maxLength('model', 255)
            ->allowEmptyString('model');

        $validator
            ->scalar('type')
            ->maxLength('type', 255)
            ->allowEmptyString('type');

        $validator
            ->integer('order_files')
            ->allowEmptyString('order_files');

        $validator
            ->integer('user_id')
            ->requirePresence('user_id', 'create')
            ->notEmptyString('user_id');

        $validator
            ->scalar('extension')
            ->maxLength('extension', 10)
            ->allowEmptyString('extension');

        $validator
            ->scalar('alt')
            ->maxLength('alt', 255)
            ->allowEmptyString('alt');

        $validator
            ->scalar('description')
            ->maxLength('description', 4294967295)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

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
     * @return Upload
     */
    public function getEntity(int $id = null) :Upload
    {
        if ($id) {
            return $this
                ->get($id);
        }
        return $this->newEntity([]);
    }
}
