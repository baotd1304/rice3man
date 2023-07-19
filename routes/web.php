<?php

use App\Http\Controllers\admin\AdminContactController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\NewsController;
use App\Http\Controllers\client\ProductsController;
use App\Http\Controllers\client\CartController;
use App\Http\Controllers\client\AccountController;
use App\Http\Controllers\admin\ProductsController as AdminProductController;
use App\Http\Controllers\admin\NewsController as AdminNewsController;
use App\Http\Controllers\admin\CategoriesNews;
use App\Http\Controllers\admin\ProductCategorysController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\client\AddjobController;
use App\Http\Controllers\client\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\CoupouController;
use App\Http\Controllers\admin\AdminUserController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\CommentController;
use App\Http\Controllers\admin\PurchaseController;
use App\Http\Controllers\admin\CategoryGroupController;
use App\Http\Controllers\admin\ImportHistoryController;

use App\Http\Controllers\client\AuthController;
use App\Http\Controllers\client\CouponController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Symfony\Component\Routing\Router;


// ADMIN CONTROLLER
use App\Http\Controllers\admin\NguoiDungController;
use App\Http\Controllers\admin\DatHangController;
use App\Http\Controllers\admin\LoaiSPController;
use App\Http\Controllers\admin\headerAdminController;
use App\Http\Controllers\admin\BinhLuanController;
use App\Http\Controllers\admin\SanphamController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/')->name('client')->middleware('auth.client')->group(function () {
    Route::get('/account', [AccountController::class, 'account'])->name('account');
});

Route::prefix('/')->name('client')->group(function () {
    Route::get('/login', [AuthController::class, 'show_login_user'])->name('show-login');
    Route::get('/logout', [AuthController::class, 'logout_user'])->name('logout-user');
    Route::post('/login', [AuthController::class, 'login_user'])->name('login');
    Route::get('/register', [AuthController::class, 'show_register_user'])->name('show-register');
    Route::post('/register', [AuthController::class, 'register_user'])->name('register');
    Route::get('/email/verify/{token}', [AuthController::class, 'verify_email'])->name('verify-email');

    Route::get('/', [HomeController::class, 'index']);
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/category/{slug}', [ProductsController::class, 'category'])->name('category');
    Route::get('/category-group', [ProductsController::class, 'group_all'])->name('category-group-all');
    Route::get('/category-group/{slug}', [ProductsController::class, 'group'])->name('category-group');
    Route::get('/product/{slug}', [ProductsController::class, 'productDetail'])->name('product-detail');
    Route::get('/news', [NewsController::class, 'index'])->name('news');
    Route::get('/news/{id}', [NewsController::class, 'newsDetail'])->name('news-detail');
    Route::get('/cart', [CartController::class, 'cart'])->name('cart');
    Route::get('/contact', [ContactController::class, 'contact'])->name('show-contact');
    Route::post('/contact', [ContactController::class, 'contact_'])->name('contact');
    Route::get('/addjobs', [AddjobController::class, 'index'])->name('addjobs');
    Route::get('/payment', [PaymentController::class, 'index'])->name('payment');
    Route::post('/payment_cod', [PaymentController::class, 'create_payment_cod'])->name('payment_cod');
    Route::post('/payment_vnpay', [PaymentController::class, 'create_payment_vnpay_e'])->name('payment_vnpay');
    Route::get('/return_payment_vnpay', [PaymentController::class, 'return_payment_vnpay_e'])->name('return_payment_vnpay');
    Route::post('/payment_momo_qr', [PaymentController::class, 'create_payment_momo_qr'])->name('payment_momo_qr');
    Route::get('/return_payment_momo_qr', [PaymentController::class, 'return_payment_momo_qr'])->name('return_payment_momo_qr');
    Route::post('/payment_momo_atm', [PaymentController::class, 'create_payment_momo_atm'])->name('payment_momo_atm');
    Route::get('/return_payment_momo_atm', [PaymentController::class, 'return_payment_momo_atm'])->name('return_payment_momo_atm');
    Route::get('/search', [ProductsController::class, 'search'])->name('search');
    Route::get('/thanks/{code}', [PaymentController::class, 'thanks'])->name('page-thanks');
    Route::post('/add-to-cart', [ProductsController::class, 'addToCart'])->name('add-to-cart');
    Route::post('/buy-now', [ProductsController::class, 'buyNow'])->name('buy-now');
    Route::post('/minus-to-cart', [ProductsController::class, 'minusToCart'])->name('minus-to-cart');
    Route::post('/remove-to-cart', [ProductsController::class, 'removeToCart'])->name('remove-to-cart');
    Route::post('/remove-all-cart', [ProductsController::class, 'removeAllCart'])->name('remove-all-cart');
    Route::post('/comment', [NewsController::class, 'comment'])->name('comment');
    Route::post('/useCouponCode', [CouponController::class, 'useCouponCode'])->name('use-coupon-code');
});
//
// Route::resource('/admin/product', AdminProductController::class);
Route::prefix('/admin')->name('site')->group(function () {
    Route::get('/login', [AuthController::class, 'show_login_admin'])->name('show-login');
    Route::post('/login', [AuthController::class, 'login_admin'])->name('login');
    Route::get('/admin_users/them', [AdminUserController::class, 'them'])->name('admin.admin_users.create');
    Route::post('/admin_users/them', [AdminUserController::class, 'them1'])->name('admin.admin_users.create_');
});

// PHAN ADMIN
Route::prefix('/admin')->middleware('auth.admin')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'admin.dashboard'])->name('admin.dashboard');

    
    //2. Route san pham
    Route::get('/sanpham/index', [SanphamController::class, 'index'])->name('sanpham.index');
    Route::get('/sanpham/create', [SanphamController::class, 'create'])->name('sanpham.create');
    Route::post('/sanpham', [SanphamController::class, 'store'])->name('sanpham.store');
    Route::get('/sanpham/{id}/edit', [SanphamController::class, 'edit'])->name('sanpham.edit');
    Route::put('/sanpham/{id}', [SanphamController::class, 'update'])->name('sanpham.update');
    Route::delete('/sanpham/{id}', [SanphamController::class, 'destroy'])->name('sanpham.destroy');

    // Route hiển thị danh sách đơn hàng
    Route::get('/orders', [DatHangController::class, 'index'])->name('chitiethoadon.index');

    // Route hiển thị chi tiết đơn hàng
    Route::get('/orders/{idHD}', [DatHangController::class, 'show1'])->name('showhoadon.show1');

    

    // Route hiển thị danh sách đơn hàng
    // Route::get('/orders', [DatHangController::class, 'index'])->name('chitiet.index');

    // Route hiển thị chi tiết đơn hàng
    Route::get('/orders/{idHD}', [DatHangController::class, 'show1'])->name('showhoadon.show1');


    //Get all information

    Route::get('/getAll/{q}', [headerAdminController::class, 'searchFollowCategory'])->name('admin.getAll');

    //quản lý comment




    Route::get('/binhluan/{idSP}', [BinhLuanController::class, 'index'])->name('binhluan.index');
    Route::get('/binhluan/{idSP}/create', [BinhLuanController::class, 'create'])->name('binhluan.create');
    Route::post('/binhluan/{idSP}', [BinhLuanController::class, 'store'])->name('binhluan.store');
    Route::get('/binhluan/{idBL}/edit', [BinhLuanController::class, 'edit'])->name('binhluan.edit');
    Route::put('/binhluan/{idBL}', [BinhLuanController::class, 'update'])->name('binhluan.update');
    Route::delete('/binhluan/{idBL}', [BinhLuanController::class, 'destroy'])->name('binhluan.destroy');

    //update thêm
    Route::put('/sanpham/{idSP}/binhluan/{idBL}', [BinhLuanController::class, 'update'])->name('binhluan.update');

});
