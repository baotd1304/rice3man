<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class chitietdonhang extends Model
{
    use HasFactory;
    protected $table = 'chitiethoadon';

    // Định nghĩa quan hệ với model Order (đơn hàng)
    public function order()
    {
        return $this->belongsTo(Order::class, 'idHD');
    }
    public function user()
    {
        return $this->belongsTo(Order::class, 'idHD');
    }

    // Định nghĩa quan hệ với model Product (sản phẩm)
    public function product()
    {
        return $this->belongsTo(Product::class, 'idSP');
    }
    public function getAllOrders()
    {
        return $this->all();
    }
    // Định nghĩa khóa chính của model
    protected $primaryKey = 'idCTHD';

    // Không sử dụng các trường created_at và updated_at
    public $timestamps = false;
}
