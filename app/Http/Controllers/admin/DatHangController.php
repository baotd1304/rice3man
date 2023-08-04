<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NguoiDung;
use App\Models\Order;
use App\Models\chitietdonhang;

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
        $ten = $order->tenNguoiNhan;
        $email = $order->email;
        $sdt = $order->soDienThoai;
        $diachi = $order->diaChi;
        $thanhToan = $order->thanhToan;
        return view('admin.qlyhoadon.show', compact('order', 'order1', 'tt', 'user','sdt','diachi','email','thanhToan'));
    }
    public function index()
    {
        $Order = new Order();
        $orders = $Order->getAllOrders();
        
        return view('admin.qlyhoadon.index', ['orders' => $orders]);
    }
    
    

    
}


