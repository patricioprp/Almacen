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
        $this->call(UserTableSeeder::class);
        $this->call(DomicilioTableSeeder::class);
    }
}