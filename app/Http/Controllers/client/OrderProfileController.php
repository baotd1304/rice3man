<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\chitietdonhang;
use App\Models\MaGiamGia;
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
    
    public function showOrderDetail($randomString)
    {
        $order = Order::where('randomString', $randomString)->first();
        $mgg = MaGiamGia::find($order->idMGG); // Lấy thông tin đơn hàng từ model Order theo $randomString
        $user = User::where('id', $order->idND)->first(); // Truy xuất thông tin người dùng
        $order1 = chitietdonhang::join('sanpham', 'sanpham.idSP', '=', 'chitiethoadon.idSP')
                                ->join('hoadon', 'hoadon.idHD', '=', 'chitiethoadon.idHD')
                                ->select('chitiethoadon.*', 'sanpham.slug', 'hoadon.idMGG')
                                ->where('chitiethoadon.idHD', $order->idHD)->get();

        return view('profile.order.detail', compact('order', 'order1', 'user', 'mgg'));
    }
    public function update(Request $request, $randomString)
    {
        $validatedData =$request->validate([
            'isDone' => 'required | numeric',
        ]);
       
        Order::where('randomString', $randomString)->update($validatedData);
        
        return redirect()->route('orderPersonal.index')->with('success', 'Hủy đơn hàng thành công!');
    }


}
