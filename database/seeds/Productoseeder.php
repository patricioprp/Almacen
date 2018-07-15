<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class Productoseeder extends Seeder
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
        \DB::table('productos')->insert(array(
           'precio_costo'  => $faker->randomElement(['1','20','43','29',
           '32','94','20','99']),
           'precio_venta'  => $faker->randomElement(['100','200','430','290',
           '432','94949','220','9499']),
           'descripcion'  => $faker->randomElement(['SDD 256gb','Ram ddr3 8gb','Pendrive 8gb','Disco Rigido 1Tb',
           'Cable de red','Parlantes','Mouse','Teclado']),
           'stock_id' => $i,
           'tipo_id' => $i,
           'created_at' => date('Y-m-d H:m:s'),
           'updated_at' => date('Y-m-d H:m:s')
    ));
}
    }
}
