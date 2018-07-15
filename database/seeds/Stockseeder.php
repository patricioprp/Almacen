<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class Stockseeder extends Seeder
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
        \DB::table('stocks')->insert(array(
           'cantidad'  => $faker->randomElement(['1','20','43','29',
           '432','94949','220','9499']),
           'minimo'  => $faker->randomElement(['1','20','43','29',
           '432','94949','220','9499']),
           'created_at' => date('Y-m-d H:m:s'),
           'updated_at' => date('Y-m-d H:m:s')
    ));
}
    }
}
