<?php
use Phinx\Seed\AbstractSeed;

/**
 * SurveysQuestions seed.
 */
class SurveysQuestionsSeed extends AbstractSeed
{
    /**
     * Run Method.
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

        $table = $this->table('surveys_questions');

        $faker = Faker\Factory::create();
        for ($i = 1; $i < 6; $i++) {
            for ($j = 0; $j < 12; $j++) {
                $data[] = [
                    'title' => "Q".$j." ".$faker->words(3, true),
                    'weighting' => $faker->numberBetween(1,10),
                    'position' => $j,
                    'surveys_id' => $i
                ];
            }
        }
        
        $table->insert($data)->save();
    }
}
