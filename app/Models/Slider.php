<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table ="sliders"; 
    public $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = ['id', 'tenSlider', 'hinhSlider', 'nhom', 'anHien'];
    protected $dates = ['ngayDang'];
    protected $attributes= ['hinhSlider'=>'', 'anHien'=>1];
}
