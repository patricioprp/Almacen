<?php

use Illuminate\Database\Seeder;

class DomicilioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 17 ; $i++) {
            $u=new App\Domicilio();
            $u->calle='u'.$i;
            $u->barrio='u'.$i;
            $u->numero=$i.$i;
            $u->location_id=$i;
            $u->save();
        }
    }
}
