<?php

use Illuminate\Database\Seeder;

class Compra extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 17 ; $i++) {
            $u=new App\Compra();
            $u->fecha=date('Y-m-d');
            $u->monto=$i.$i;
            $u->proveedor_id=$i;
            $u->user_id=$i;
            $u->save();
        }
    }
}
