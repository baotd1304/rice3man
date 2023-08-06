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
    protected $fillable = ['idBL', 'idSP', 'idND', 'noiDung',
                            'anHien'];
    protected $dates = ['ngayBL'];
    protected $attributes= ['anHien'=>1];
    
    // public function nguoibl()
    // {
    //     return $this->belongsTo(NguoiDung::class, 'idND', 'idND');
    // }
    // public function baiviet()
    // {
    //     return $this->belongsTo(SanPham::class, 'idSP', 'idSP');
    // }

    public function author()
    {
        return $this->belongsTo(User::class,'idND','id');
    }
    public function sanphams()
    {
        return $this->belongsTo(SanPham::class,"idSP","idSP");
    }
}
