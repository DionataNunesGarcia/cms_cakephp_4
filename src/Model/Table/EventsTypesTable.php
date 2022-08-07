<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;

/**
 * EventsTypes Model
 *
 * @method \App\Model\Entity\EventsType newEmptyEntity()
 * @method \App\Model\Entity\EventsType newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\EventsType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EventsType get($primaryKey, $options = [])
 * @method \App\Model\Entity\EventsType findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\EventsType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EventsType[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\EventsType|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EventsType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EventsType[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EventsType[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\EventsType[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EventsType[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EventsTypesTable extends Table
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

        $this->setTable('events_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Events', [
            'foreignKey' => 'event_type_id',
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
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 255)
            ->requirePresence('slug', 'create')
            ->notEmptyString('slug');

        $validator
            ->scalar('color')
            ->maxLength('color', 255)
            ->requirePresence('color', 'create')
            ->notEmptyString('color');

        return $validator;
    }

    /**
     * @param Event $event
     * @param \ArrayObject $data
     * @param \ArrayObject $options
     * @return void
     */
    public function beforeMarshal(Event $event, \ArrayObject $data, \ArrayObject $options)
    {
        if (!empty($data['name'])) {
            $data['slug'] = strtolower(Text::slug($data['name']));
        }
    }

    /**
     * @param int|null $id
     * @return Entity
     */
    public function getEntity(int $id = null) :Entity
    {
        if ($id) {
            return $this->get($id);
        }
        return $this->newEmptyEntity();
    }
}
