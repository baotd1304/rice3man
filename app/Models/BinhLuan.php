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
                            'anHien', 'parent_id'];
    protected $dates = ['ngayBL'];
    protected $attributes= ['anHien'=>1, 'parent_id'=>''];
    
    public function user()
    {
        return $this->belongsTo(User::class,'idND','id');
    }
    public function sanpham()
    {
        return $this->belongsTo(SanPham::class,"idSP","idSP");
    }
    public function replies()
    {
        return $this->hasMany(BinhLuan::class, 'parent_id');
    }
}
