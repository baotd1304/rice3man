<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    use HasFactory;
    protected $table ="baiviet"; 
    public $primaryKey = "idBV";
    public $timestamps = false;
    protected $fillable = ['idBV', 'tieuDe', 'noiDung', 'thumbNail', 'anHien', 'tacGia'];
    protected $dates = ['ngayDang'];
    protected $attributes= ['noiDung'=>'', 'anHien'=>1]; 
}
