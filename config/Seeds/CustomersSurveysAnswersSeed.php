<?php
use Phinx\Seed\AbstractSeed;

/**
 * CustomersSurveysAnswers seed.
 */
class CustomersSurveysAnswersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        $table = $this->table('customers_surveys_answers');

        $faker = Faker\Factory::create();


        //$sql = "SELECT * FROM customers_surveys"
        //$this->fetchAll($sql);

        for ($customers_id = 0; $customers_id < 100; $customers_id++) {
                for ($cquest = 1; $cquest < 13; ++$cquest) {
                    $data[] = [
                        'answer' =>  $faker->randomFloat(1,0,10),
                        'customers_surveys_id' => $customers_id,
                        'surveys_questions_id' => $cquest,
                    ];
                }
        }


        $table->insert($data)->save();

    }
}
