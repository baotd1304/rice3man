<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\category;
use App\Models\category_group;
use App\Models\LoaiSP;
use App\Models\news;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\SanPham;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Json;
use NumberFormatter;

class HomeController extends Controller
{
    public function index()
    {   
        $productsFlashSale=SanPham::all()->where('discount','>=',0);
        $categoriesGroup=LoaiSP::with('SanPhams')->get();
        $data=[
            "productsFlashSale"=>$productsFlashSale,
            "categories"=>$categoriesGroup,
        ];
        return view('client.home.index',$data);
    }
    public function getAll()
    {
        
    }
    public function exam()
    {
        $category=LoaiSP::all();

        dd($category->products);
        // $pro=$category->products;
        // return json_encode($category->products);
        // dd($category_group);
        // $category->pruduct;
        // $category->images;
        $data=[
            // "products"=>$products,
            "cate"=>$category,
        ];
        return view('client.exam',$data);

        // return Json($data);
        
    }
}
