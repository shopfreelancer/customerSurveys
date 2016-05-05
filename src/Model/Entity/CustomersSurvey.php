<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CustomersSurvey Entity.
 *
 * @property int $id
 * @property string $timestamp
 * @property string $surveys_id
 * @property \App\Model\Entity\Survey $Surveys
 * @property int $customers_id
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\CustomersSurveysAnswer[] $CustomersSurveysAnswers
 */
class CustomersSurvey extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    protected function _getSurveySum()
    {
        $sum = 0;
        foreach($this->CustomersSurveysAnswers as $customersSurveysAnswer){
            $sum += $customersSurveysAnswer->answer;
        }
        return $sum;
    }
}
