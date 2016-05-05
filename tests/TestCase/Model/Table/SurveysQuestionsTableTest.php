<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SurveysQuestionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SurveysQuestionsTable Test Case
 */
class SurveysQuestionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SurveysQuestionsTable
     */
    public $SurveysQuestions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.surveys_questions',
        'app.surveys',
        'app.customers',
        'app.countries',
        'app.customers_tickets',
        'app.customers_surveys',
        'app.customers_surveys_answers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SurveysQuestions') ? [] : ['className' => 'App\Model\Table\SurveysQuestionsTable'];
        $this->SurveysQuestions = TableRegistry::get('SurveysQuestions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SurveysQuestions);

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
