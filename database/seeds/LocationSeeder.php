<?php

use Illuminate\Database\Seeder;
use App\Location;
class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
            'name' 				=>	'San Miguel de Tucuman',
            'province_id'          =>  '1'
        ]);
        Location::create([
            'name' 				=>	'Yerba Buena',
            'province_id'          =>  '1'
        ]);
        Location::create([
            'name' 				=>	'Oran',
            'province_id'          =>  '2'
        ]);
        Location::create([
            'name' 				=>	'Salta',
            'province_id'          =>  '2'
        ]);
        Location::create([
            'name' 				=>	'San Salvador de Jujuy',
            'province_id'          =>  '3'
        ]);
        Location::create([
            'name' 				=>	'Tilcara',
            'province_id'          =>  '3'
        ]);
        Location::create([
            'name' 				=>	'Purmamarca',
            'province_id'          =>  '3'
        ]);
        Location::create([
            'name' 				=>	'Porto Real',
            'province_id'          =>  '4'
        ]);
        Location::create([
            'name' 				=>	'Arraial do Cabo',
            'province_id'          =>  '4'
        ]);
        Location::create([
            'name' 				=>	'Barra do Piraí',
            'province_id'          =>  '4'
        ]);
        Location::create([
            'name' 				=>	'Mirandópolis',
            'province_id'          =>  '5'
        ]);
        Location::create([
            'name' 				=>	'Paranapuã',
            'province_id'          =>  '5'
        ]);
        Location::create([
            'name' 				=>	'Corral Quemado (Chile)',
            'province_id'          =>  '6'
        ]);
        Location::create([
            'name' 				=>	'Farellones',
            'province_id'          =>  '6'
        ]);
        Location::create([
            'name' 				=>	'Quillota',
            'province_id'          =>  '7'
        ]);
        Location::create([
            'name' 				=>	'Los Andes (Chile)‎',
            'province_id'          =>  '7'
        ]);
    }
}
