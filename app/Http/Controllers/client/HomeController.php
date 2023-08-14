<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\BaiViet;
use App\Models\BinhLuan;
use App\Models\Contact;
use App\Models\LoaiSP;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\Slider;
use App\Models\ThuongHieuSP;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Json;
use NumberFormatter;

class HomeController extends Controller
{
    public function index()
    {   
        $productsFlashSale=SanPham::where('discount','>=',0)->where('anHien', 1)->where('noiBat', 1)->orderbyDesc('ngayDang')->get();
        $categoriesGroup=LoaiSP::with('SanPhams')->get();
        $thuonghieusp=ThuongHieuSP::where('anHien', 1)->orderbyDesc('thuTu')->get();
        $sliders=Slider::where('anHien', 1)->orderbyDesc('ngayDang')->get();
        $binhluans=BinhLuan::join('users', 'users.id', '=', 'binhluan.idND')
                ->join('sanpham', 'sanpham.idSP', '=', 'binhluan.idSP')
                ->select('binhluan.*', 'users.name', 'users.avatar', 'sanpham.slug')
                ->where('binhluan.anHien', 1)
                ->orderbyDesc('ngayBL')->get();
        $news=BaiViet::where('anHien', 1)->where('noiBat', 1)->orderbyDesc('ngayDang')->get();
        $data=[
            "productsFlashSale"=>$productsFlashSale,
            "categories"=>$categoriesGroup,
            "thuonghieusps"=>$thuonghieusp,
            "news"=>$news,
            "sliders" => $sliders,
            "binhluans" => $binhluans,
        ];
        return view('client.home.index', $data);
    }

   
}
