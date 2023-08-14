<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $isDone = random_int(1, 3);//random cot isDone hoadon
        if ($isDone==2){ //neu don hang da hoan thanh thi bat buoc phai la da thanh toan va da giao hang
            $thanhToan = 1;
            $trangThai = 1;
        } else {
            $thanhToan = random_int(0,1);
            $trangThai = random_int(0,1);
        }
        return [
            'idND' => random_int(1, 100),
            'idMGG' => random_int(1, 10),
            'tenNguoiNhan' => fake()->name(),
            'email' => fake()->safeEmail(),
            'soDienThoai' => fake()->e164PhoneNumber(),
            'diaChi' => fake()->address(),
            'tongTien' => random_int(40000, 800000),
            'ngayMua' => now(),
            'thanhToan' => $thanhToan,
            'trangThai' => $trangThai,
            'isDone' => random_int(0,3),
        ];
    }
}
