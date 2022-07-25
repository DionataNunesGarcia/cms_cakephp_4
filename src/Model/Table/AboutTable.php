<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\About;
use App\Model\Entity\SystemParameter;
use App\Utils\ConvertCharacters;
use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use function Twig\Extra\Markdown\twig_html_to_markdown;

/**
 * About Model
 *
 * @method \App\Model\Entity\About newEmptyEntity()
 * @method \App\Model\Entity\About newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\About[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\About get($primaryKey, $options = [])
 * @method \App\Model\Entity\About findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\About patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\About[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\About|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\About saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\About[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\About[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\About[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\About[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AboutTable extends Table
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

        $this->setTable('about');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('title')
            ->maxLength('title', 60)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 100)
            ->allowEmptyString('phone');

        $validator
            ->scalar('cell_phone')
            ->maxLength('cell_phone', 100)
            ->allowEmptyString('cell_phone');

        $validator
            ->scalar('facebook')
            ->maxLength('facebook', 255)
            ->allowEmptyString('facebook');

        $validator
            ->scalar('instagram')
            ->maxLength('instagram', 255)
            ->allowEmptyString('instagram');

        $validator
            ->scalar('linkedin')
            ->maxLength('linkedin', 255)
            ->allowEmptyString('linkedin');

        $validator
            ->scalar('github')
            ->maxLength('github', 255)
            ->allowEmptyString('github');

        $validator
            ->scalar('about')
            ->maxLength('about', 4294967295)
            ->allowEmptyString('about');

        $validator
            ->scalar('vision')
            ->maxLength('vision', 4294967295)
            ->allowEmptyString('vision');

        $validator
            ->scalar('mission')
            ->maxLength('mission', 4294967295)
            ->allowEmptyString('mission');

        $validator
            ->scalar('values')
            ->maxLength('values', 4294967295)
            ->allowEmptyString('values');

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
        if (!empty($data['phone'])) {
            $data['phone'] = ConvertCharacters::onlyNumbers($data['phone']);
        }
        if (!empty($data['cell_phone'])) {
            $data['cell_phone'] = ConvertCharacters::onlyNumbers($data['cell_phone']);
        }
        if (isset($data['about'])) {
            $data['about'] = trim(utf8_encode($data['about']));
        }
        if (isset($data['mission'])) {
            $data['mission'] = trim(utf8_encode($data['mission']));
        }
        if (isset($data['vision'])) {
            $data['vision'] = trim(utf8_encode($data['vision']));
        }
        if (isset($data['values_about'])) {
            $data['values_about'] = trim(utf8_encode($data['values_about']));
        }
    }

    /**
     * @return About
     */
    public function getEntity()
    {
        $entity = $this->find()->first();
        return $entity ?? $this->newEntity([]);
    }
}
