<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ThuongHieuSP extends Model
{
    use HasFactory, Sluggable;

    protected $table ="thuonghieusp";
    public  $primaryKey = "idTH";
    public $timestamps = false;
    protected $fillable = ['idTH', 'tenTH', 'slug', 'urlHinhTH', 'thuTu', 'anHien'];
    protected $attributes= ['anHien'=> 1, 'urlHinhTH'=>''];
    
    public function SanPhams()
    {
       return $this->hasMany(SanPham::class,"idTH","idTH");
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'tenLoai'
            ]
        ];
    }
}
