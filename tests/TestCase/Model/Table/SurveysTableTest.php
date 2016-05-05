<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SurveysTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SurveysTable Test Case
 */
class SurveysTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SurveysTable
     */
    public $Surveys;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.surveys',
        'app.customers_surveys'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Surveys') ? [] : ['className' => 'App\Model\Table\SurveysTable'];
        $this->Surveys = TableRegistry::get('Surveys', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Surveys);

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
