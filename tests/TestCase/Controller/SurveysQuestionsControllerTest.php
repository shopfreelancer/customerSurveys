<?php
namespace App\Test\TestCase\Controller;

use App\Controller\SurveysQuestionsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\SurveysQuestionsController Test Case
 */
class SurveysQuestionsControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
