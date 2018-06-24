<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 16 ; $i++) {
            $u=new App\User();
            $u->name = 'u'.$i;
            $u->apellido = 'u.u'.$i;
            $u->email='u'.$i.'@a.com';
            $u->turno= 'maniana';
            $u->password=bcrypt('123456');
            $u->telefono=$i;
            $u->dni=$i;
            $u->domicilio_id=$i;
            $u->save();
        } //for ($i=0; $i < 5 ; $i++) {
        //generamos 1 usuario más
        App\User::create(
                [
                    'name' => 'Patricio',
                    'apellido' => 'Polito',
                    'email' => 'patricioprp06@gmail.com',
                    'turno' => 'maniana',
                    'password' => bcrypt('32460264'),
                    'telefono' => '3814',
                    'dni' => '3246',
                    'domicilio_id' => '1'
                ]
        );
    }
}
