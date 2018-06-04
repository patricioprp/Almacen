<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\State;
class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            State::create([
                'name' 				=>	'Argentina'
            ]);
            State::create([
                'name' 				=>	'Brasil'
            ]);
            State::create([
                'name' 				=>	'Chile'
            ]);
       
    }
}
