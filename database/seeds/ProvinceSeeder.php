<?php

use Illuminate\Database\Seeder;
use App\Province;
class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Province::create([
            'name' 				=>	'Tucuman',
            'state_id'          =>  '1'
        ]);
        Province::create([
            'name' 				=>	'Salta',
            'state_id'          =>  '1'
        ]);
        Province::create([
            'name' 				=>	'Jujuy',
            'state_id'          =>  '1'
        ]);
        Province::create([
            'name' 				=>	'Rio de Janerio',
            'state_id'          =>  '2'
        ]);
        Province::create([
            'name' 				=>	'San pablo',
            'state_id'          =>  '2'
        ]);
        Province::create([
            'name' 				=>	'Santiago de Chile',
            'state_id'          =>  '3'
        ]);
        Province::create([
            'name' 				=>	'Valparaiso',
            'state_id'          =>  '3'
        ]);
    }
    
}

