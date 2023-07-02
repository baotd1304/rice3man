<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaGiamGia extends Model
{
    use HasFactory;

    protected $table = 'magiamgia';
    protected $primaryKey = 'idMMG';
    public $timestamps = false;

    protected $fillable = [
    ];
}
