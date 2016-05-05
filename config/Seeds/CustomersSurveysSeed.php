<?php
use Phinx\Seed\AbstractSeed;

/**
 * CustomersSurveys seed.
 */
class CustomersSurveysSeed extends AbstractSeed
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

        $table = $this->table('customers_surveys');

        $faker = Faker\Factory::create();

        $now = date("Y-m-d", time());
        
        for ($customers_id = 0; $customers_id < 10; $customers_id++) {
            for ($i = 1; $i < 6; $i++) {
                $data[] = [
                    'surveys_id' => $i,
                    'timestamp' => $now,
                    'customers_id' => $customers_id
                ];
            }
        }


        $table->insert($data)->save();
    }
}
