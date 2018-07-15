<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class Tipo_seeder extends Seeder
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
        \DB::table('tipos')->insert(array(
           'descripcion'  => $faker->randomElement(['perifericos','display','Memorias','DIsco Rigido',
           'Microprocesador','Pendrive','Cable','Accesorio']),
           'created_at' => date('Y-m-d H:m:s'),
           'updated_at' => date('Y-m-d H:m:s')
    ));
}
    }
}
