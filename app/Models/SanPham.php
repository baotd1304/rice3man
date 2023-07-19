<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SanPham extends Model
{
    use HasFactory;

    protected $table = 'sanpham';
    protected $primaryKey = 'idSP';
    public $timestamps = false;
    protected $fillable = ['idSP', 'idLoai', 'idTH', 'tenSP', 'giaSP', 'urlHinh', 'moTa',
                            'soLuotXem', 'soLuotMua', 'anHien', 'noiBat'];
    protected $dates = ['ngayDang'];
    protected $attributes= ['soLuotXem'=>0, 'soLuotMua'=>0, 'moTa'=>'', 'urlHinh'=>'',
                            'anHien'=>1, 'noiBat'=>1, 'idLoai'=>1, 'idTH'=>1 ]; 

    // Quan hệ 1-nhiều với bình luận
    public function binhLuans()
    {
        return $this->hasMany(BinhLuan::class, 'sanpham_id', 'id');
    }
    public function LoaiSP()
    {
        return $this->belongsTo(LoaiSP::class,'idLoai','idSP');
    }
    
}
