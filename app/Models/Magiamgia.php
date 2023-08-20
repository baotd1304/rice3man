<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaGiamGia extends Model
{
    use HasFactory;

    protected $table = 'magiamgia';
    protected $primaryKey = 'idMGG';
    public $timestamps = false;

    protected $fillable = ['maGiamGia', 'chiTiet', 'loaiMa', 'giaTri', 'dieuKien',
                        'luotSuDung', 'gioiHan', 'hoatDong', 'ngayBatDau', 'ngayKetThuc'];
    protected $dates = ['ngayBatDau', 'ngayKetThuc'];
    protected $attributes= ['chiTiet'=>'', 'dieuKien'=>'', 
                        'luotSuDung'=>'', 'gioiHan'=>'', 'hoatDong'=>1,];
    
    public function order()
    {
        return $this->hasMany(Order::class, 'idHD');
    }


}
