<?php
namespace App\Model\Table;

use App\Model\Entity\CustomersSurveysAnswer;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CustomersSurveysAnswers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $CustomersSurveys
 * @property \Cake\ORM\Association\BelongsTo $SurveysQuestions
 */
class CustomersSurveysAnswersTable extends Table
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

        $this->table('customers_surveys_answers');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('CustomersSurveys', [
            'foreignKey' => 'customers_surveys_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('SurveysQuestions', [
            'foreignKey' => 'surveys_questions_id',
            'joinType' => 'INNER',
            'propertyName' => 'SurveysQuestions'
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
            ->requirePresence('answer', 'create')
            ->notEmpty('answer');

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
        $rules->add($rules->existsIn(['customers_surveys_id'], 'CustomersSurveys'));
        $rules->add($rules->existsIn(['surveys_questions_id'], 'SurveysQuestions'));
        return $rules;
    }
}
