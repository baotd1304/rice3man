<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table ="contact"; 
    public $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = ['id', 'name', 'logo', 'email', 'hotline',
                        'address', 'description'];
    protected $attributes= ['description'=>''];
}
