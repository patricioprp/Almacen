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
        $faker = Faker::create();
        for ($i=1; $i < 16 ; $i++) {
            $u=new App\User();
            $u->name = 'u'.$i;
            $u->apellido = 'u.u'.$i;
            $u->email='u'.$i.'@a.com';
            $u->turno= 'maniana';
            $u->password=bcrypt('123456');
            $u->telefono=$i;
            $u->dni=$i;
            $u->fechaAlta=date('Y-m-d');
            $u->type = $faker->randomElement(['member','admin']);
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
                    'type' => 'admin',
                    'fechaAlta' => '1986-11-26',
                    'domicilio_id' => '1'
                ]
        );
        App\User::create(
            [
                'name' => 'Lucas',
                'apellido' => 'Arcas',
                'email' => 'lukasarcas@gmail.com',
                'turno' => 'maniana',
                'password' => bcrypt('lucasarcas'),
                'telefono' => '3814',
                'dni' => '3246',
                'type' => 'member',
                'fechaAlta' => '1991-07-10',
                'domicilio_id' => '1'
            ]
    );
    }
}
