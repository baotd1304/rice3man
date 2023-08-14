<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(LoaispSeeder::class);
        $this->call(ThuonghieuspSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(ChitietdonhangSeeder::class);
        $this->call(OrderSeeder::class);
    }
}
