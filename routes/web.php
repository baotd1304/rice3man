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

use App\Http\Controllers\ProfileController;

// ADMIN CONTROLLER
use App\Http\Controllers\admin\NguoiDungController;
use App\Http\Controllers\admin\DatHangController;
use App\Http\Controllers\admin\LoaiSPController;
use App\Http\Controllers\admin\BinhLuanController;
use App\Http\Controllers\admin\ProfileAdminController;
use App\Http\Controllers\admin\SanphamController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\Admin\ThuonghieuSPController;
use App\Http\Controllers\Admin\BaivietController;
use App\Http\Controllers\Admin\UserController;

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

Route::prefix('/')->name('client')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/account', [ProfileController::class, 'edit'])->name('account');
});

Route::prefix('/')->name('client')->group(function () {
    // Route::get('/login', [AuthController::class, 'show_login_user'])->name('show-login');
    // Route::get('/logout', [AuthController::class, 'logout_user'])->name('logout-user');
    // Route::post('/login', [AuthController::class, 'login_user'])->name('login');
    // Route::get('/register', [AuthController::class, 'show_register_user'])->name('show-register');
    // Route::post('/register', [AuthController::class, 'register_user'])->name('register');
    // Route::get('/email/verify/{token}', [AuthController::class, 'verify_email'])->name('verify-email');

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
    Route::get('/thanks/{idHD}', [PaymentController::class, 'thanks'])->name('page-thanks');
    Route::post('/add-to-cart', [ProductsController::class, 'addToCart'])->name('add-to-cart');
    Route::post('/buy-now', [ProductsController::class, 'buyNow'])->name('buy-now');
    Route::post('/minus-to-cart', [ProductsController::class, 'minusToCart'])->name('minus-to-cart');
    Route::post('/remove-to-cart', [ProductsController::class, 'removeToCart'])->name('remove-to-cart');
    Route::post('/remove-all-cart', [ProductsController::class, 'removeAllCart'])->name('remove-all-cart');
    Route::post('/comment', [ProductsController::class, 'binhluan'])->name('comment');
    Route::post('/useCouponCode', [CouponController::class, 'useCouponCode'])->name('use-coupon-code');
});
//
// Route::resource('/admin/product', AdminProductController::class);
// Route::prefix('/admin')->name('site')->group(function () {
//     Route::get('/login', [AuthController::class, 'show_login_admin'])->name('show-login');
//     Route::post('/login', [AuthController::class, 'login_admin'])->name('login');
//     Route::get('/admin_users/them', [AdminUserController::class, 'them'])->name('admin.admin_users.create');
//     Route::post('/admin_users/them', [AdminUserController::class, 'them1'])->name('admin.admin_users.create_');
// });

// PHAN ADMIN
Route::prefix('/admin')->middleware('auth', 'adminAccess')->group(function () {

    Route::get('/profile', [ProfileAdminController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/profile', [ProfileAdminController::class, 'update'])->name('admin.profile.update');
    Route::delete('/profile', [ProfileAdminController::class, 'destroy'])->name('admin.profile.destroy');

    Route::view('/dashboard', 'admin.dashboard')->name('admin.dashboard');
    
    //1.Route Loai san pham
    Route::get('/loaisp/index', [LoaiSPController::class, 'index'])->name('loaisp.index');
    Route::get('/loaisp/create', [LoaiSPController::class, 'create'])->name('loaisp.create');
    Route::post('/loaisp', [LoaiSPController::class, 'store'])->name('loaisp.store');
    Route::get('/loaisp/{id}/edit', [LoaiSPController::class, 'edit'])->name('loaisp.edit');
    Route::put('/loaisp/{id}', [LoaiSPController::class, 'update'])->name('loaisp.update');
    Route::delete('/loaisp/{id}', [LoaiSPController::class, 'destroy'])->name('loaisp.destroy');

    //2. Route san pham
    Route::get('/sanpham/index', [SanphamController::class, 'index'])->name('sanpham.index');
    Route::get('/sanpham/create', [SanphamController::class, 'create'])->name('sanpham.create');
    Route::post('/sanpham', [SanphamController::class, 'store'])->name('sanpham.store');
    Route::get('/sanpham/{id}/edit', [SanphamController::class, 'edit'])->name('sanpham.edit');
    Route::put('/sanpham/{id}', [SanphamController::class, 'update'])->name('sanpham.update');
    Route::delete('/sanpham/{id}', [SanphamController::class, 'destroy'])->name('sanpham.destroy');

    //3. Route thuong hieu san pham
    Route::get('/thuonghieusp/index', [ThuonghieuSPController::class, 'index'])->name('thuonghieusp.index');
    Route::get('/thuonghieusp/create', [ThuonghieuSPController::class, 'create'])->name('thuonghieusp.create');
    Route::post('/thuonghieusp', [ThuonghieuSPController::class, 'store'])->name('thuonghieusp.store');
    Route::get('/thuonghieusp/{id}/edit', [ThuonghieuSPController::class, 'edit'])->name('thuonghieusp.edit');
    Route::put('/thuonghieusp/{id}', [ThuonghieuSPController::class, 'update'])->name('thuonghieusp.update');
    Route::delete('/thuonghieusp/{id}', [ThuonghieuSPController::class, 'destroy'])->name('thuonghieusp.destroy');

    //4. Route bai viet
    Route::get('/baiviet/index', [BaivietController::class, 'index'])->name('baiviet.index');
    Route::get('/baiviet/create', [BaivietController::class, 'create'])->name('baiviet.create');
    Route::post('/baiviet', [BaivietController::class, 'store'])->name('baiviet.store');
    Route::get('/baiviet/{id}/edit', [BaivietController::class, 'edit'])->name('baiviet.edit');
    Route::put('/baiviet/{id}', [BaivietController::class, 'update'])->name('baiviet.update');
    Route::delete('/baiviet/{id}', [BaivietController::class, 'destroy'])->name('baiviet.destroy');

    //5. Route binh luan
    Route::get('/binhluan/index', [BinhLuanController::class, 'index'])->name('binhluan.index');
    Route::get('/binhluan/create', [BinhLuanController::class, 'create'])->name('binhluan.create');
    Route::post('/binhluan', [BinhLuanController::class, 'store'])->name('binhluan.store');
    Route::get('/binhluan/{id}/edit', [BinhLuanController::class, 'edit'])->name('binhluan.edit');
    Route::put('/binhluan/{id}', [BinhLuanController::class, 'update'])->name('binhluan.update');
    Route::delete('/binhluan/{id}', [BinhLuanController::class, 'destroy'])->name('binhluan.destroy');

    //6. Route user
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    //7. Route slider
    Route::get('/slider/index', [SliderController::class, 'index'])->name('slider.index');
    Route::get('/slider/create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('/slider', [SliderController::class, 'store'])->name('slider.store');
    Route::get('/slider/{id}/edit', [SliderController::class, 'edit'])->name('slider.edit');
    Route::put('/slider/{id}', [SliderController::class, 'update'])->name('slider.update');
    Route::delete('/slider/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');


    // Route hiển thị danh sách đơn hàng
    Route::get('/orders', [DatHangController::class, 'index'])->name('chitiethoadon.index');

    // Route hiển thị chi tiết đơn hàng
    Route::get('orders/{idHD}', [DatHangController::class, 'show1'])->name('showhoadon.show1');

});


// Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('clienthome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__.'/auth.php';
