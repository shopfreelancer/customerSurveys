<?php
use Migrations\AbstractMigration;

class CreateCustomerSurveysAnswers extends AbstractMigration
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
        $table = $this->table('customers_surveys_answers');

        $table->addColumn('answer', 'float', [
            'default' => null,
            'null' => false,
        ]);

        $table->addColumn('customers_surveys_id', 'text', [
            'default' => null,
            'null' => false,
        ]);

        $table->addColumn('surveys_questions_id', 'text', [
            'default' => null,
            'null' => false,
        ]);

        $table->create();
    }
}
