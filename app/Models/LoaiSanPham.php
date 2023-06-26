<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    use HasFactory;

    protected $table = 'loaisanpham';
    protected $primaryKey = 'idLoai';
    public $timestamps = false;

    protected $fillable = [
        'tenLoai',
        'thuTu',
        'anHien',
    ];
}
