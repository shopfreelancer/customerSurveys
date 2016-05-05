<?php
use Phinx\Seed\AbstractSeed;

/**
 * CustomerTickets seed.
 */
class CustomerTicketsSeed extends AbstractSeed
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

        $faker = Faker\Factory::create();

        for ($i = 0; $i < 1000; $i++) {
            $data[] = [
                'title'         => $faker->words(3,true),
                'description'   => $faker->sentence,
                'created'       => $faker->dateTimeThisCentury->format('Y-m-d H:i:s'),
                'ticket_time'         => $faker->time('H:i'),
                'price_rate'    => 60,
                'customers_id'  => $faker->numberBetween(1,100),
                'status'        => $faker->numberBetween(1,3),
            ];
        }

        //$this->insert('customers', $data);

        $table = $this->table('customers_tickets');
        $table->insert($data)->save();
    }
}
