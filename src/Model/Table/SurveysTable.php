<?php
namespace App\Model\Table;

use App\Model\Entity\Survey;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Surveys Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Customers
 */
class SurveysTable extends Table
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

        $this->table('surveys');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->belongsToMany('Customers', [
            'foreignKey' => 'survey_id',
            'targetForeignKey' => 'customer_id',
            'joinTable' => 'customers_surveys'
        ]);

        $this->hasMany('SurveysQuestions', [
            'foreignKey' => 'surveys_id',
            'joinType' => 'LEFT',
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
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        return $validator;
    }
}
