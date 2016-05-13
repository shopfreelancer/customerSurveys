<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;
use Cake\I18n\FrozenTime;

class AggregateSurveysComponent extends Component
{
    protected $timelineLabels = [];

    public function getAllSurveysAvg()
    {

        $conn = ConnectionManager::get('default');

        $sql = 'SELECT csurveysum.timestamp, ROUND(AVG(csurveysum.csum),2) AS sum
            FROM (
            (
            SELECT cs.timestamp, SUM( csa.answer ) AS csum
            FROM customers_surveys cs
            LEFT JOIN customers_surveys_answers csa ON ( csa.customers_surveys_id = cs.id ) 
            GROUP BY cs.id
            ORDER BY cs.timestamp ASC
            ) AS csurveysum
        ) GROUP BY csurveysum.timestamp 
        ORDER BY csurveysum.timestamp ASC';

        $results = $conn->execute($sql)->fetchAll('assoc');
        foreach($results as $key => $row){
            $results[$key]['timestamp'] = new Date($row['timestamp']);
        }
        return $results;
    }

    /**
     * The graph timeline needs a label for every timestamp
     * there are one to many chart and every chart has many timestamps
     * we want a chronological timeline and for every chart either the corresponding value
     * or an empty value if no sum exists for the given timestamp
     * at the end we get an nested array for the charts and the values timestamp / sum
     *
     */
    public function getTimeline($groupedCustomersSurveys)
    {
        $this->timelineLabels = $this->getAllTimestamps();

        $completeTimelineChart = [];

        foreach($groupedCustomersSurveys as $customersSurveys){
            $completeTimelineChart[] = $this->getSingleTimeline($customersSurveys);

        }
        return $completeTimelineChart;

    }

    /**
     * Returns a complete timeline for one chart
     *
     * @param $customersSurveys
     *
     * @return array
     */
    public function getSingleTimeline($customersSurveys)
    {
        $newCustomersChart = $this->timelineLabels;
        

        foreach($newCustomersChart as $key => $value){
            foreach ($customersSurveys as $customersSurvey) {
                if($customersSurvey->timestamp->toUnixString() === $value['timestamp']->toUnixString()) {
                    $newCustomersChart[$key]['sum'] = $customersSurvey->surveySum;
                }
            }
        }

        $newCustomersChart['title'] = $customersSurveys[0]->Surveys->title;

        return $newCustomersChart;
    }

    /**
     * Get an array list with all timestamps as unique values
     * used for the js graph labels
     *
     * @return array
     */
    public function getAllTimestamps()
    {
        $customersSurveys = TableRegistry::get('CustomersSurveys');
        $query = $customersSurveys->find()
            ->select(['timestamp'])
            ->distinct(['timestamp'])
            ->hydrate(false)
            ->order(['timestamp' => 'ASC'])
            ->toList();

        foreach($query as $key => $value){
            $query[$key]['sum'] = 0;
        }

        return $query;

    }
}