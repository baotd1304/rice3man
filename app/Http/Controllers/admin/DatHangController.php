<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\chitietdonhang;

class DatHangController extends Controller
{
    
    // Hiển thị danh sách đơn hàng
    public function index()
    {
        $Order = new Order();
        $orders = $Order->getAllOrders();
        
        return view('admin.qlyhoadon.index', ['orders' => $orders]);
    }
    
    // Hiển thị chi tiết đơn hàng
    public function showOrderDetail($idHD)
    {
        $order1 = chitietdonhang::where('idHD', $idHD)->get();
        $order = Order::find($idHD); // Lấy thông tin đơn hàng từ model Order theo $idHD
        $user = User::find($order->idND); // Truy xuất thông tin người dùng

        return view('admin.qlyhoadon.orderDetail', compact('order', 'order1', 'user'));
    }
    

    public function update(Request $request, $id)
    {
        $validatedData =$request->validate([
            
            'trangThai' => 'required | boolean',
            'thanhToan' => 'required | boolean',
            'isDone' => 'required | numeric',
        ],[
            
        ]);
       
        Order::where('idHD', $id)->update($validatedData);
        
        return redirect()->route('order.index')->with('success', 'Cập nhật hóa đơn ID '.$id.' thành công!');
    }
    
    

    
}


