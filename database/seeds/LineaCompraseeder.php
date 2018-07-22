<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class LineaCompraseeder extends Seeder
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
        \DB::table('compra_producto')->insert(array(
           'producto_id' => $i,
           'compra_id' => $i,
           'created_at' => date('Y-m-d H:m:s'),
           'updated_at' => date('Y-m-d H:m:s')
    ));
}
    }
}
