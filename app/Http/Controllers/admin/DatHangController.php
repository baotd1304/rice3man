<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\chitietdonhang;
use App\Models\NguoiDung;
use App\Models\Order;
use Illuminate\Http\Request;

class DatHangController extends Controller
{
     // Hiển thị danh sách đơn hàng
    
    
    // Hiển thị chi tiết đơn hàng
    public function show1($idHD)
    {
        $order1 = chitietdonhang::findOrFail($idHD);
        $order = Order::find($order1->idHD); // Lấy thông tin đơn hàng từ model Order theo $idHD
        $tt = $order1->giaSP * $order1->soLuong;
        $user = NguoiDung::find($order->idND); // Truy xuất thông tin người dùng
        $email = $user->email;
        $sdt = $user->sdt;
        $diachi = $user->diaChi;
        return view('admin.qlyhoadon.show', compact('order', 'order1', 'tt', 'user','sdt','diachi','email'));
    }
    public function index()
    {
        $Order = new Order();
        $orders = $Order->getAllOrders();
        
        return view('admin.qlyhoadon.index', ['orders' => $orders]);
    }
    
}
