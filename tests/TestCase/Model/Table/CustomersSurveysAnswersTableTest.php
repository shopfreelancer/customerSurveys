<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CustomersSurveysAnswersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CustomersSurveysAnswersTable Test Case
 */
class CustomersSurveysAnswersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CustomersSurveysAnswersTable
     */
    public $CustomersSurveysAnswers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.customers_surveys_answers',
        'app.customers_surveys',
        'app.surveys',
        'app.customers',
        'app.countries',
        'app.customers_tickets',
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
        $config = TableRegistry::exists('CustomersSurveysAnswers') ? [] : ['className' => 'App\Model\Table\CustomersSurveysAnswersTable'];
        $this->CustomersSurveysAnswers = TableRegistry::get('CustomersSurveysAnswers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CustomersSurveysAnswers);

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
