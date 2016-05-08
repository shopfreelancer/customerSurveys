<?php
use Phinx\Seed\AbstractSeed;

/**
 * Surveys seed.
 */
class SurveysSeed extends AbstractSeed
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

        $table = $this->table('surveys');


        $faker = Faker\Factory::create();

        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'title'   => "Survey ".$i." ".$faker->words(3,true),
            ];
        }

        $table->insert($data)->save();
    }
}
