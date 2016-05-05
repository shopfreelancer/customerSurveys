<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CustomersSurveysTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CustomersSurveysTable Test Case
 */
class CustomersSurveysTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CustomersSurveysTable
     */
    public $CustomersSurveys;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.customers_surveys',
        'app.surveys',
        'app.customers',
        'app.countries',
        'app.customers_tickets',
        'app.customers_surveys_answers',
        'app.surveys_questions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CustomersSurveys') ? [] : ['className' => 'App\Model\Table\CustomersSurveysTable'];
        $this->CustomersSurveys = TableRegistry::get('CustomersSurveys', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CustomersSurveys);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
