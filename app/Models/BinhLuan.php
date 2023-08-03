<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    use HasFactory;
    protected $table ="binhluan"; 
    public $primaryKey = "idBL";
    public $timestamps = false;
    protected $fillable = ['idBL', 'idSP', 'idND', 'noiDung', 'tacgia',
                            'anHien', 'noiBat'];
    protected $dates = ['ngayDang'];
    protected $attributes= ['thumbNail'=>'', 'tacGia'=>'', 'noidung'=>'',
                            'anHien'=>1, 'noiBat'=>1];
    
    public function nguoibl()
    {
        return $this->belongsTo(NguoiDung::class, 'idND', 'idND');
    }
    public function baiviet()
    {
        return $this->belongsTo(SanPham::class, 'idSP', 'idSP');
    }
    
}
