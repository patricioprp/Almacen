<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 55 ; $i++) {
            $u=new App\User();
            $u->name='u'.$i;
            $u->apellido='u'.$i;
            $u->email='u'.$i.'@a.com';
            $u->password=bcrypt('123456');
            $u->save();
        } //for ($i=0; $i < 5 ; $i++) {
        //generamos 1 usuario más
        App\User::create(
                [
                    'name' => 'Patricio',
                    'apellido' => 'Polito',
                    'email' => 'patricioprp06@gmail.com',
                    'password' => bcrypt('32460264')
                ]
        );
    }
}
