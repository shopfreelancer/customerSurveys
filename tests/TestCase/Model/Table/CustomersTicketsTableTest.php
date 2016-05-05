<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CustomersTicketsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CustomersTicketsTable Test Case
 */
class CustomersTicketsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CustomersTicketsTable
     */
    public $CustomersTickets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.customers_tickets'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CustomersTickets') ? [] : ['className' => 'App\Model\Table\CustomersTicketsTable'];
        $this->CustomersTickets = TableRegistry::get('CustomersTickets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CustomersTickets);

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
}
