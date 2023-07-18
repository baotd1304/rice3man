<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    protected $table ="sanpham"; 
    public $primaryKey = "idSP";
    public $timestamps = false;
    protected $fillable = ['idSP', 'idLoai', 'idTH', 'tenSP', 'giaSP', 'urlHinh', 'moTa',
                            'soLuotXem', 'soLuotMua', 'anHien', 'noiBat'];
    protected $dates = ['ngayDang'];
    protected $attributes= ['soLuotXem'=>0, 'soLuotMua'=>0, 'moTa'=>'', 'urlHinh'=>'',
                            'anHien'=>1, 'noiBat'=>1, 'idLoai'=>1, 'idTH'=>1 ]; 
}
