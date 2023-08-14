<?php

namespace Database\Seeders;

use App\Models\LoaiSP;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoaispSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listloaisp = [[
            'tenLoai' => 'Gạo trắng (gạo tẻ)', 
            'thuTu' => 1, 
            'anHien' => 1,
        ],[
            'tenLoai' => 'Gạo nếp', 
            'thuTu' => 2, 
            'anHien' => 1,
        ],
        [
            'tenLoai' => 'Gạo lứt', 
            'thuTu' => 3, 
            'anHien' => 1,
        ],[
            'tenLoai' => 'Gạo tấm', 
            'thuTu' => 4, 
            'anHien' => 1,
        ],[
            'tenLoai' => 'Gạo hữu cơ (organic)', 
            'thuTu' => 5, 
            'anHien' => 1,
        ],[
            'tenLoai' => 'Gạo mầm, hỗn hợp', 
            'thuTu' => 6, 
            'anHien' => 1,
        ]];
        LoaiSP::insert($listloaisp);
    }
}
