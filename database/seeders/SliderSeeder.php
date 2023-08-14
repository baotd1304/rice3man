<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listSlider = [[
            'tenSlider' => 'Slider 1', 
            'hinhSlider' => '/upload/images/slider\2023-07-29_1690624544_1.png', 
            'nhom' => 1,
            'anHien' => 1
        ],[
            'tenSlider' => 'Slider 2', 
            'hinhSlider' => '/upload/images/slider\2023-07-29_1690624556_2.png', 
            'nhom' => 1, 
            'anHien' => 1
        ],[
            'tenSlider' => 'Slider 3', 
            'hinhSlider' => '/upload/images/slider\2023-07-29_1690624572_3.png', 
            'nhom' => 1, 
            'anHien' => 1
        ]];
        Slider::insert($listSlider);
        

    }
}
