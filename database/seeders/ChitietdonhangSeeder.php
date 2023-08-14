<?php

namespace Database\Seeders;

use App\Models\chitietdonhang;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChitietdonhangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        chitietdonhang::factory()->count(100)->create();
    }
}
