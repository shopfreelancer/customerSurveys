<?php
namespace App\Model\Table;

use App\Model\Entity\CustomersSurvey;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CustomersSurveys Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Surveys
 * @property \Cake\ORM\Association\BelongsTo $Customers
 */
class CustomersSurveysTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('customers_surveys');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Surveys', [
            'foreignKey' => 'surveys_id',
            'joinType' => 'INNER',
            'propertyName' => 'Surveys'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customers_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('CustomersSurveysAnswers', [
            'foreignKey' => 'customers_surveys_id',
            'dependent' => true,
            'propertyName' => 'CustomersSurveysAnswers'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('timestamp', 'create')
            ->notEmpty('timestamp');


        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['surveys_id'], 'Surveys'));
        $rules->add($rules->existsIn(['customers_id'], 'Customers'));
        $rules->add($rules->isUnique(['timestamp', 'surveys_id']));
        return $rules;
    }
}
