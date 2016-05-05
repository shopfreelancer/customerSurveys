<?php
use Phinx\Seed\AbstractSeed;

/**
 * Customers seed.
 */
class CustomersSeed extends AbstractSeed
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
        $data = [
            [
                'firstname'=>"Martin",
                'lastname'=>"Mantz",
                'companyname'=>"Miayfairo GmbH",
                'street'=>"Hauptgasse 121",
                'postcode'=>"10292",
                'city'=>'Stuttgart',
                'country_id'=>2,
                'phone'=>"0721 1212121212",
                'www'=>"internet-service-test.de",
                'email'=>'info@shop-freelancer.de'
            ]
        ];

        $faker = Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'firstname'     => $faker->firstName,
                'lastname'      => $faker->lastName,
                'companyname'   => $faker->company,
                'city'          => $faker->city,
                'postcode'      => $faker->postcode,
                'street'        => $faker->streetName." ".$faker->streetAddress,
                'email'         => $faker->email,
                'www'           => $faker->domainName,
                'phone'         => $faker->phoneNumber

            ];
        }

        $this->insert('customers', $data);

        $table = $this->table('customers');
        $table->insert($data)->save();
    }
}
