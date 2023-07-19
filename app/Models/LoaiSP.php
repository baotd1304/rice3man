<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSP extends Model
{
    use HasFactory;

    protected $table = 'loaisanpham';
    protected $primaryKey = 'idLoai';
    public $timestamps = false;

    protected $fillable = ['idLoai', 'tenLoai','thuTu', 'anHien'];
    protected $attributes= ['anHien'=> 1];
    public function SanPhams()
    {
       return $this->hasMany(SanPham::class,"idLoai","idLoai");
    }
}
