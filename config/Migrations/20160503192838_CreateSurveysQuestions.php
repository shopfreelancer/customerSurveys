<?php
use Migrations\AbstractMigration;

class CreateSurveysQuestions extends AbstractMigration
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
        $table = $this->table('surveys_questions');

        $table->addColumn('title', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);

        $table->addColumn('position', 'integer', [
            'default' => null,
            'null' => false,
        ]);

        $table->addColumn('surveys_id', 'integer', [
            'default' => null,
            'null' => false,
        ]);


        $table->create();
    }
}
