<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\chitietdonhang;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderProfileController extends Controller
{
    public function index()
    {
        $perPage = 10;
        $id = Auth::user()->id;
        $email = Auth::user()->email;
        $phone = Auth::user()->phone;
        $orderPersonal = Order::where('idND', $id)
                                ->orWhere('email', $email)->orWhere('soDienThoai', $phone)
                                ->orderbyDesc('ngayMua')->paginate($perPage);
        
        return view('profile.order.index', ['orderPersonal' => $orderPersonal]);
    }
    
    public function showOrderDetail($idHD)
    {
        $order1 = chitietdonhang::where('idHD', $idHD)->get();
        $order = Order::find($idHD); // Lấy thông tin đơn hàng từ model Order theo $idHD
        $user = User::find($order->idND); // Truy xuất thông tin người dùng

        return view('profile.order.detail', compact('order', 'order1', 'user'));
    }
    public function update(Request $request, $id)
    {
        $validatedData =$request->validate([
            'isDone' => 'required | numeric',
        ],[

        ]);
       
        Order::where('idHD', $id)->update($validatedData);
        
        return redirect()->route('orderPersonal.index')->with('success', 'Hủy đơn hàng thành công!');
    }


}
