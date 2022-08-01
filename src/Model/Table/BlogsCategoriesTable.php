<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\BlogsCategory;
use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;

/**
 * BlogsCategories Model
 *
 * @method \App\Model\Entity\BlogsCategory newEmptyEntity()
 * @method \App\Model\Entity\BlogsCategory newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\BlogsCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BlogsCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\BlogsCategory findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\BlogsCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BlogsCategory[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\BlogsCategory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BlogsCategory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BlogsCategory[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BlogsCategory[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\BlogsCategory[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BlogsCategory[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BlogsCategoriesTable extends Table
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

        $this->setTable('blogs_categories');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Blogs', [
            'foreignKey' => 'blog_category_id',
        ]);

        $this->addBehavior('Timestamp');

        $this->addBehavior('RegisterLogChange');
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
            ->scalar('slug')
            ->maxLength('slug', 60)
            ->requirePresence('slug', 'create')
            ->notEmptyString('slug');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

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
     * @return BlogsCategory
     */
    public function getEntity(int $id = null) :BlogsCategory
    {
        if ($id) {
            return $this->get($id);
        }
        return $this->newEmptyEntity();
    }
}
