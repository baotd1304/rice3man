<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class LoaiSP extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'loaisanpham';
    protected $primaryKey = 'idLoai';
    public $timestamps = false;

    protected $fillable = ['idLoai', 'tenLoai','thuTu', 'anHien', 'slug'];
    protected $attributes= ['anHien'=> 1];
    public function SanPhams()
    {
       return $this->hasMany(SanPham::class,"idLoai","idLoai");
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
