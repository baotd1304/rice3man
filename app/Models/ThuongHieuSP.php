<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThuongHieuSP extends Model
{
    use HasFactory;
    protected $table ="thuonghieusp";
    public  $primaryKey = "idTH";
    public $timestamps = false;
    protected $fillable = ['idTH', 'tenTH', 'urlHinhTH', 'thuTu', 'anHien'];
    protected $attributes= ['anHien'=> 1, 'urlHinhTH'=>''];
    public function SanPhams()
    {
       return $this->hasMany(SanPham::class,"idTH","idTH");
    }
}
