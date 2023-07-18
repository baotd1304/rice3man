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
    protected $fillable = ['idBV', 'idSP', 'idND', 'noiDung', 'anHien'];
    protected $dates = ['ngayBL'];
    protected $attributes= ['noiDung'=>'', 'noidung'=>'', 'anHien'=>1]; 
}
