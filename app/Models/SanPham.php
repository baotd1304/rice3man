<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;

    protected $table = 'sanpham';
    protected $primaryKey = 'idSP';
    protected $fillable = [
        'ten',
        'moTa',
        'gia',
        'soLuong',
        // Các trường khác của bảng 'sanpham'
    ];

    // Quan hệ 1-nhiều với bình luận
    public function binhLuans()
    {
        return $this->hasMany(BinhLuan::class, 'sanpham_id', 'id');
    }
}
