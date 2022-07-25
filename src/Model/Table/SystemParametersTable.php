<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\SystemParameter;
use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Utils\ConvertCharacters;

/**
 * SystemParameters Model
 *
 * @method \App\Model\Entity\SystemParameter newEmptyEntity()
 * @method \App\Model\Entity\SystemParameter newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\SystemParameter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SystemParameter get($primaryKey, $options = [])
 * @method \App\Model\Entity\SystemParameter findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\SystemParameter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SystemParameter[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\SystemParameter|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SystemParameter saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SystemParameter[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SystemParameter[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\SystemParameter[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SystemParameter[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SystemParametersTable extends Table
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

        $this->setTable('system_parameters');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

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
            ->scalar('social_reason')
            ->maxLength('social_reason', 255)
            ->requirePresence('social_reason', 'create')
            ->notEmptyString('social_reason');

        $validator
            ->scalar('fantasy_name')
            ->maxLength('fantasy_name', 255)
            ->requirePresence('fantasy_name', 'create')
            ->notEmptyString('fantasy_name');

        $validator
            ->scalar('cnpj_cpf')
            ->maxLength('cnpj_cpf', 20)
            ->requirePresence('cnpj_cpf', 'create')
            ->notEmptyString('cnpj_cpf');

        $validator
            ->boolean('generate_access_logs')
            ->notEmptyString('generate_access_logs');

        $validator
            ->boolean('generate_change_log')
            ->notEmptyString('generate_change_log');

        $validator
            ->scalar('emails')
            ->maxLength('emails', 4294967295)
            ->requirePresence('emails', 'create')
            ->notEmptyString('emails');

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
        if (!empty($data['emails'])) {
            $data['emails'] = implode(';', $data['emails']);
        }
        if (!empty($data['cnpj_cpf'])) {
            $data['cnpj_cpf'] = ConvertCharacters::onlyNumbers($data['cnpj_cpf']);
        }
    }

    /**
     * @return SystemParameter
     */
    public function getEntity() :SystemParameter
    {
        $entity = $this->find()->first();
        return $entity ?? $this->newEntity([]);
    }
}
