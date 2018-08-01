<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class cuenta_corrienteseeder extends Seeder
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
        \DB::table('cuenta_corrientes')->insert(array(
           'monto'  => $faker->randomElement(['1','20','43','29',
           '32','94','20','99']),
           'fecha' => date('Y-m-d'),
           'estado' => $faker->randomElement(['activo','deudor']),
           'venta_id' => $i,
           'cliente_id' => $i,
           'created_at' => date('Y-m-d H:m:s'),
           'updated_at' => date('Y-m-d H:m:s')
    ));
}
    }
}
