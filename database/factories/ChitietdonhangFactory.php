<?php

namespace Database\Factories;

use App\Models\SanPham;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ChitietdonhangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $id = random_int(1, 36);//random 36 sanpham
        return [
            'idHD' => random_int(1, 100),
            'idSP' => $id,
            'tenSP' => SanPham::find($id)->tenSP,
            'soLuong' => fake()->randomNumber(1,10),
            'giaSP' => SanPham::find($id)->giaSP,
            'urlHinh' => SanPham::find($id)->urlHinh,
        ];
    }
}
