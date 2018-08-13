<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DetalleLiquidacion extends Seeder
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
            \DB::table('detalle_liquidacions')->insert(array(
                   'monto' => $i.$i,
                   'subtotal' => $i.$i,
                   'liquidacion_id' => $i,
                   'concepto_id' => $i,
                   'created_at' => date('Y-m-d H:m:s'),
                   'updated_at' => date('Y-m-d H:m:s')
            ));
        }
    }
}
