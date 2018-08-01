<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class linea_ventaseeder extends Seeder
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
        \DB::table('linea_ventas')->insert(array(
           'venta_id' => $i,
           'producto_id' => $i,

    ));
}
    }
}
