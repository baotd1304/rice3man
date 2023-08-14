<?php

namespace Database\Seeders;

use App\Models\ThuongHieuSP;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThuonghieuspSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listTHsp = [[
            'tenTH' => 'Vinh Hiển', 
            'urlHinhTH' => '/upload/images/thuonghieuSP\2023-07-22_1690037870_vinh-hien-21072022145433.jpg',
            'thuTu' => 1,
            'anHien' => 1
        ],[
            'tenTH' => 'Vua Gạo',
            'urlHinhTH' => '/upload/images/thuonghieuSP\2023-07-22_1690037880_vua-gao-05042021172031.jpg', 
            'thuTu' => 2, 
            'anHien' => 1
        ],[
            'tenTH' => 'Hạt Ngọc Trời', 
            'urlHinhTH' => '/upload/images/thuonghieuSP\2023-07-22_1690037890_hat-ngoc-troi-05042021235620.jpg', 
            'thuTu' => 3, 
            'anHien' => 1
        ],[
            'tenTH' => 'An Gia', 
            'urlHinhTH' => '/upload/images/thuonghieuSP\2023-07-22_1690037899_an-gia-04042021002.jpg', 
            'thuTu' => 4, 
            'anHien' => 1
        ],[
            'tenTH' => 'Lotus Rice', 
            'urlHinhTH' => '/upload/images/thuonghieuSP\2023-07-22_1690037908_lotus-rice-0404202123823.jpg', 
            'thuTu' => 5,
            'anHien' => 1
        ],[
            'tenTH' => 'Lạc Việt', 
            'urlHinhTH' => '/upload/images/thuonghieuSP\2023-07-22_1690037922_lac-viet-2506202295023.jpg', 
            'thuTu' => 6, 
            'anHien' => 1
        ],[
            'tenTH' => 'PMT', 
            'urlHinhTH' => '/upload/images/thuonghieuSP\2023-07-22_1690037965_pmt-15032021131922.jpg', 
            'thuTu' => 7, 
            'anHien' => 1
        ],[
            'tenTH' => 'Vibigaba', 
            'urlHinhTH' => '/upload/images/thuonghieuSP\2023-07-22_1690037974_vibigaba-05042021163544.jpg', 
            'thuTu' => 8, 
            'anHien' => 1
        ]];
        ThuongHieuSP::insert($listTHsp);
    }
}
