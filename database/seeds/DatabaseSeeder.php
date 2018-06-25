<?php
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StateSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(DomicilioTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ClienteTableSeeder::class);
        $this->call(Liquidacion::class);
        $this->call(Concepto::class);
        $this->call(DetalleLiquidacion::class);
    }
}