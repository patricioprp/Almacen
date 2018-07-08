<?php

use Illuminate\Database\Seeder;

class Proveedor extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 17 ; $i++) {
            $u=new App\Proveedor();
            $u->nombre='u'.$i;
            $u->telefono=$i.$i;
            $u->domicilio_id=$i;
            $u->save();
        }
    }
}
