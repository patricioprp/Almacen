<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ClienteTableSeeder extends Seeder
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
    \DB::table('clientes')->insert(array(
           'nombre' => $faker->firstNameFemale,
           'apellido' => $faker->firstNameFemale,
           'dni' => $i.$i.$i.$i,
           'estado'  => $faker->randomElement(['activo','deudor']),
           'telefono' => $i.$i.$i.$i,
           'domicilio_id' => $i,
           'created_at' => date('Y-m-d H:m:s'),
           'updated_at' => date('Y-m-d H:m:s')
    ));
}
    }
}
