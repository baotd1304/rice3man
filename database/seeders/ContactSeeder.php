<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listContact = [
            'name' => 'Cửa hàng lương thực Gạo 3 Ông', 
            'logo' => '/upload/images/logo\logoRice3Man.png',
            'email' => 'gao3ong@gmail.com',
            'hotline' => '19008080',
            'address' => 'Công viên phần mềm Quang Trung, Q12, TP Hồ Chí Minh',
            'description' => '',
        ];
        Contact::insert($listContact);
    }
}
