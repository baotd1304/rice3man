<?php
namespace App\Models;
use App\Models\User;
use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'hoadon';
    protected $primaryKey = 'idHD';
    public $timestamps = false;

    // Định nghĩa quan hệ với model User (người dùng)
    public function user()
    {
        return $this->belongsTo(NguoiDung::class, 'idND');
    }
    
    // Định nghĩa quan hệ với model OrderDetail (đơn hàng chi tiết)
    public function orderDetails()
    {
        return $this->hasMany(chitietdonhang::class, 'idHD');
    }
    public function getAllOrders()
    {
        return $this->all();
    }
}
