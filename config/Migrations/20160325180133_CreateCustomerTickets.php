<?php
use Migrations\AbstractMigration;

class CreateCustomerTickets extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('customers_tickets');

        $table->addColumn('title', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('description', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('comment', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('ticket_time', 'time', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('price_rate', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('status', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('customers_id', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}

/**
 *
CREATE TABLE IF NOT EXISTS `customer_tickets` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`customer_id` varchar(50) DEFAULT NULL,
`title` varchar(50) DEFAULT NULL,
`description` longtext,
`comment` longtext,
`created` datetime DEFAULT NULL,
`modified` datetime DEFAULT NULL,
`taxrate` double DEFAULT NULL,
`hours` double DEFAULT NULL,
`minutes` double DEFAULT NULL,
`price_rate` varchar(30) NOT NULL,
`active` double DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

 */