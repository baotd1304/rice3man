<?php

namespace App\Http\Controllers\client;

use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\LoaiSP;
use App\Models\MaGiamGia;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\BinhLuan;
use App\Models\Contact;

class ProductsController extends Controller
{
    protected $cartFarmApp = [];
    protected $query;
    protected $rq;
    public function __construct(Request $request)
    {
        $this->rq = $request;
        $this->query = SanPham::query();
        $minPrice = $request->get('min_price');
        $maxPrice = $request->get('max_price');
        $sortBy = $request->get('sort_by');

        if ($minPrice && $maxPrice) {
            $this->query->whereBetween('giaSP', [$minPrice, $maxPrice]);
        }

        switch ($sortBy) {
            case 'name_asc':
                $this->query->orderBy('tenSP', 'asc');
                break;
            case 'name_desc':
                $this->query->orderBy('tenSP', 'desc');
                break;
            case 'price_desc':
                $this->query->orderBy('giaSP', 'desc');
                break;
            case 'price_asc':
                $this->query->orderBy('giaSP', 'asc');
                break;
            case 'newest':
                $this->query->orderBy('ngayDang', 'desc');
                break;
            case 'oldest':
                $this->query->orderBy('ngayDang', 'asc');
                break;
        }
        if (isset($_COOKIE["cartFarmApp"])) {
            $json = $_COOKIE["cartFarmApp"];
            $this->cartFarmApp = json_decode($json, true);
        }
    }
    public function index(Request $request)
    {
        dd($request->sort);
        $products = SanPham::paginate(12);
        // $categoriesGroup = LoaiSP::with('categories.products')->where('is_hot', 1)->limit(3)->get();
        $data = [
            "products" => $products
        ];
        return view('client.products.index', $data);
    }
    public function category($slug)
    {
        $category = LoaiSP::where('slug', $slug)->firstOrFail();
        $categories = LoaiSP::all();
        $products =  $this->query->where('idLoai', $category->idLoai)->paginate(8);
        $coupons = MaGiamGia::limit(4)->get();
        
        $data = [
            "category" => $category,
            "categories" => $categories,
            "products" => $products,
            "coupons" => $coupons,
            "title" => $category->tenLoai,
            "request" => $this->rq
        ];
        return view('client.products.index', $data);
    }
    public function group($slug)
    {
        $categories = LoaiSP::with('sanPhams')->get();
        $categoryGroup = LoaiSP::with('sanPhams')->where('idSP', $slug)->first();
        $products = $this->query->whereHas('category', function ($query) use ($slug) {
            $query->whereHas('category_group', function ($query) use ($slug) {
                $query->where('slug', $slug);
            });
        })->paginate(8);
        // dd($products);

        $data = [
            "products" => $products,
            "categories" => $categories,
            "title" => $categoryGroup->name,
            "request" => $this->rq
        ];
        return view('client.products.index', $data);
    }
    public function group_all(Request $request)
    {

        $products = $this->query->paginate(8);
        $categories = LoaiSP::with('sanPhams')->get();
        $coupons = MaGiamGia::limit(4)->get();

        $data = [
            "products" => $products,
            "categories" => $categories,
            "title" => "Tất cả sản phẩm",
            "coupons" => $coupons,
            "request" => $request
        ];
        return view('client.products.index', $data);
    }
    public function productDetail($slug)
    {
        $product = SanPham::where('slug', $slug)->firstOrFail();
        $product_relate = SanPham::where('idLoai', $product->idLoai)->get();
        $binhluans=BinhLuan::join('users', 'users.id', '=', 'binhluan.idND')
                ->select('binhluan.*', 'users.name', 'users.avatar')->where('anHien', 1)->where('idSP', $product->idSP)
                ->orderbyDesc('ngayBL')->get();
        $coupons = MaGiamGia::where('hoatDong', 1)
            ->where(function($query) {
                $query->whereNull('gioiHan')->orwhereColumn('luotSuDung', '<', 'gioiHan');
            })
            ->where(function($query) {
                $query->whereNull('ngayBatDau')->orWhere('ngayBatDau', '<', now(+7));
            })
            ->where(function($query) {
                $query->whereNull('ngayKetThuc')->orWhere('ngayKetThuc', '>', now(+7));
            })
            ->orderbyDesc('idMGG')
            ->get();
        $data = [
            "product" => $product,
            "coupons" => $coupons,
            "product_relate" => $product_relate,
            "binhluans"=>$binhluans,

        ];
        return view('client.productDetail.index', $data);
    }

    public function addToCart(Request $request)
    {

        $isFind = false;
        for ($i = 0; $i < count($this->cartFarmApp); $i++) {
            if ($this->cartFarmApp[$i]['productId'] == $request->productId) {
                $this->cartFarmApp[$i]['amount'] += $request->amount;
                $isFind = true;
                break;
            }
        }
        if ($isFind == false) {
            $this->cartFarmApp[] = [
                'productId'  => $request->productId,
                'amount' => $request->amount,
            ];
        }
        $cart = [];
        foreach ($this->cartFarmApp as $item) {
            if ($item['amount'] > 0) {
                $cart[] = [
                    'productId' => $item['productId'],
                    'amount'       => $item['amount']
                ];
            }
        }

        setcookie('cartFarmApp', json_encode($cart), time() + 3 * 24 * 60 * 60, '/');

        return redirect()->back();
    }
    public function buyNow(Request $request)
    {

        $isFind = false;
        for ($i = 0; $i < count($this->cartFarmApp); $i++) {
            if ($this->cartFarmApp[$i]['productId'] == $request->productId) {
                $this->cartFarmApp[$i]['amount'] += $request->amount;
                $isFind = true;
                break;
            }
        }
        if ($isFind == false) {
            $this->cartFarmApp[] = [
                'productId'  => $request->productId,
                'amount' => $request->amount,
            ];
        }
        $cart = [];
        foreach ($this->cartFarmApp as $item) {
            if ($item['amount'] > 0) {
                $cart[] = [
                    'productId' => $item['productId'],
                    'amount'       => $item['amount']
                ];
            }
        }

        setcookie('cartFarmApp', json_encode($cart), time() + 3 * 24 * 60 * 60, '/');

        return redirect()->route('clientpayment');
    }
    public function minusToCart(Request $request)
    {
        $isFind = false;
        for ($i = 0; $i < count($this->cartFarmApp); $i++) {
            if ($this->cartFarmApp[$i]['productId'] == $request->productId) {
                if ($this->cartFarmApp[$i]['amount'] <= 1) {
                    unset($this->cartFarmApp[$i]);
                    break;
                }
                $this->cartFarmApp[$i]['amount'] -= $request->amount;
                break;
            }
        }
        setcookie('cartFarmApp', json_encode($this->cartFarmApp), time() + 3 * 24 * 60 * 60, '/');

        return redirect()->back();
    }
    public function removeToCart(Request $request)
    {
        for ($i = 0; $i < count($this->cartFarmApp); $i++) {
            if ($this->cartFarmApp[$i]['productId'] == $request->productId) {
                unset($this->cartFarmApp[$i]);
                break;
            }
        }
        setcookie('cartFarmApp', json_encode($this->cartFarmApp), time() + 3 * 24 * 60 * 60, '/');

        return redirect()->back();
    }
    public function removeAllCart(Request $request)
    {

        setcookie('cartFarmApp', json_encode([]), time() + 3 * 24 * 60 * 60, '/');

        return redirect()->back();
    }
    public function search(Request $request)
    {
        $products = SanPham::where('tenSP', 'like', '%' . $request->query('q') . '%')->get();
        $data = [
            "products" => $products,
            "q" => $request->query('q')
        ];
        return view('client.search.index', $data);
    }

    public function binhluan(CommentRequest $request)
    {
       $binhluan=new BinhLuan();
       $binhluan->noiDung=$request->content;
       $binhluan->idSP=$request->idSP;
       $binhluan->idND=$request->idND;
       $binhluan->save();
       return redirect()->back();
    }


}
