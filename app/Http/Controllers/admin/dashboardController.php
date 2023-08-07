<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\SanPham;
use App\Models\LoaiSP;
use App\Models\ThuongHieuSP;
use App\Models\Slider;
use App\Models\BinhLuan;
use App\Models\BaiViet;
use App\Models\chitietdonhang;
use App\Models\User;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {   
        $productsFlashSale=SanPham::where('discount','>=',0)->where('anHien', 1)->where('noiBat', 1)->orderbyDesc('ngayDang')->get();
        $categoriesGroup=LoaiSP::with('SanPhams')->get();
        $thuonghieusp=ThuongHieuSP::where('anHien', 1)->orderbyDesc('thuTu')->get();
        $sliders=Slider::where('anHien', 1)->orderbyDesc('ngayDang')->get();
        $binhluans=BinhLuan::join('users', 'users.id', '=', 'binhluan.idND')
                ->select('binhluan.*', 'users.name', 'users.avatar')->where('anHien', 1)
                ->orderbyDesc('ngayBL')->get();
        $news=BaiViet::where('anHien', 1)->where('noiBat', 1)->orderbyDesc('ngayDang')->get();
        $orders = Order::orderbyDesc('ngayMua')->get();
        $spRecent = chitietdonhang::orderbyDesc('idCTHD')->limit(5)->get();

        $countOrders = Order::count();
        $countOrdersDone = Order::where('isDone','=',0)->count();
        $countUsers = User::count();
        $countCustomer = User::where('role','=',0)->count();
        $countRevenue = Order::sum('tongTien');
        $countRevenueDone = Order::where('isDone','=',2)->sum('tongTien');
        
        $data=[
            "productsFlashSale"=>$productsFlashSale,
            "categories"=>$categoriesGroup,
            "thuonghieusps"=>$thuonghieusp,
            "news"=>$news,
            "sliders" => $sliders,
            "binhluans" => $binhluans,
            "orders" => $orders,
            "countOrders" => $countOrders,
            "countOrdersDone" => $countOrdersDone,
            "countUsers" => $countUsers,
            "countCustomer" => $countCustomer,
            "countRevenue" => $countRevenue,
            "countRevenueDone" => $countRevenueDone,
            "spRecent" => $spRecent,
            

        ];
        return view('admin.dashboard', $data);
    }
}
