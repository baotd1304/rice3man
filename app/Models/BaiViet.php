<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class BaiViet extends Model
{
    use HasFactory, Sluggable;

    protected $table ="baiviet"; 
    public $primaryKey = "idBV";
    public $timestamps = false;
    protected $fillable = ['idBV', 'tieuDe', 'slug', 'noiDung', 
                        'tacGia', 'thumbNail', 
                        'anHien', 'noiBat'];
    protected $dates = ['ngayDang'];
    protected $attributes= ['noiDung'=>'', 'anHien'=>1, 'noiBat'=>1,
                        'thumbNail'=>''];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'tieuDe'
            ]
        ];
    }
}
