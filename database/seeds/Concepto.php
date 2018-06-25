<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class Concepto extends Seeder
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
            \DB::table('conceptos')->insert(array(
                   'descripcion' => $faker->firstNameFemale,
                   'tipo' => $faker->firstNameFemale,
                   'montoFijo' => $i.$i,
                   'montoVariable' => $i.$i,
                   'created_at' => date('Y-m-d H:m:s'),
                   'updated_at' => date('Y-m-d H:m:s')
            ));
        }
    }
}
