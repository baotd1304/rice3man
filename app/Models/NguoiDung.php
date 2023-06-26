<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NguoiDung extends Model
{
    protected $table = 'nguoidung';
    protected $primaryKey = 'idND';
    protected $fillable = [
        'ten',
        'matKhau',
        'email',
        'sdt',
        'diaChi',
        'hinh',
        'vaiTro',
        'hoatDong',
    ];
    

    use HasFactory;

    public function getVaiTroAttribute($value)
    {
        return $value == 1 ? 'admin' : 'user';
    }

    public function setVaiTroAttribute($value)
    {
        $this->attributes['vaiTro'] = $value == 'admin' ? 1 : 0;
    }

    public function getHoatDongAttribute($value)
    {
        return $value == 1 ? 'active' : 'inactive';
    }

    public function setHoatDongAttribute($value)
    {
        $this->attributes['hoatDong'] = $value == 'active' ? 1 : 0;
    }
    public $timestamps = false;
    
}




