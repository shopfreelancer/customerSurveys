<?php
use Migrations\AbstractMigration;

class CreateCustomersSurveys extends AbstractMigration
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
        $table = $this->table('customers_surveys');

        $table->addColumn('timestamp', 'text', [
            'default' => null,
            'null' => false,
        ]);

        $table->addColumn('surveys_id', 'text', [
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
