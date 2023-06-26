<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    protected $table = 'binhluan';
    protected $primaryKey = 'idBL';
    protected $fillable = ['idSP', 'idND', 'noiDung', 'ngayBL', 'anHien'];

    public function sanpham()
    {
        return $this->belongsTo(SanPham::class, 'idSP');
    }

    public function nguoidung()
    {
        return $this->belongsTo(NguoiDung::class, 'idND');
    }
}
