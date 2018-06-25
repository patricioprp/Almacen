<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class Liquidacion extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=1; $i < 16; $i++) {
            \DB::table('liquidacions')->insert(array(
                   'sueldoNeto' => $i.$i,
                   'periodo' => $faker->firstNameFemale,
                   'desde' => date('Y-m-d'),
                   'hasta' => date('Y-m-d'),
                   'estado' => 'u'.$i,
                   'user_id' => $i,
                   'created_at' => date('Y-m-d H:m:s'),
                   'updated_at' => date('Y-m-d H:m:s')
            ));
        }
    }
}
