<?php
namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $table = 'hoadon';
    protected $primaryKey = 'idHD';
    public $timestamps = false;

    // Định nghĩa quan hệ với model User (người dùng)
    public function user()
    {
        return $this->belongsTo(User::class, 'idND');
    }
    
    // Định nghĩa quan hệ với model OrderDetail (đơn hàng chi tiết)
    public function orderDetails()
    {
        return $this->hasMany(chitietdonhang::class, 'idHD');
    }
    public function getAllOrders()
    {
        return $this->orderbyDesc('ngayMua')->get();
    }
}
