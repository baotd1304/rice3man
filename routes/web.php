<?php

use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\NewsController;
use App\Http\Controllers\client\ProductsController;
use App\Http\Controllers\client\CartController;
use App\Http\Controllers\client\AddjobController;
use App\Http\Controllers\client\ContactController;
use App\Http\Controllers\PaymentController;

use App\Http\Controllers\client\CouponController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;

// ADMIN CONTROLLER
use App\Http\Controllers\admin\DatHangController;
use App\Http\Controllers\admin\LoaiSPController;
use App\Http\Controllers\admin\BinhLuanController;
use App\Http\Controllers\admin\ProfileAdminController;
use App\Http\Controllers\admin\SanphamController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\Admin\ThuonghieuSPController;
use App\Http\Controllers\Admin\BaivietController;
use App\Http\Controllers\admin\dashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ContactAdminController;

use App\Http\Controllers\client\OrderProfileController;

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

Route::prefix('/')->name('client')->group(function () {

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
    Route::get('/about', [AddjobController::class, 'index'])->name('about');
    Route::get('/huongdan', [AddjobController::class, 'demo'])->name('demo');
    Route::get('/chinh-sach', [AddjobController::class, 'chinhsach'])->name('chinhsach');
    Route::get('/payment', [PaymentController::class, 'index'])->name('payment');
    Route::post('/payment_cod', [PaymentController::class, 'create_payment_cod'])->name('payment_cod');
    Route::post('/payment_vnpay', [PaymentController::class, 'create_payment_vnpay_e'])->name('payment_vnpay');
    Route::get('/return_payment_vnpay', [PaymentController::class, 'return_payment_vnpay_e'])->name('return_payment_vnpay');
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

// PHAN ADMIN
Route::prefix('/admin')->middleware('auth', 'adminAccess')->group(function () {

    Route::get('/profile', [ProfileAdminController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/profile', [ProfileAdminController::class, 'update'])->name('admin.profile.update');
    Route::delete('/profile', [ProfileAdminController::class, 'destroy'])->name('admin.profile.destroy');

    Route::get('/dashboard', [dashboardController::class, 'index'])->name('admin.dashboard');
    
    //1.Route Loai san pham
    Route::get('/loaisp/index', [LoaiSPController::class, 'index'])->name('loaisp.index');
    Route::get('/loaisp/create', [LoaiSPController::class, 'create'])->name('loaisp.create');
    Route::post('/loaisp', [LoaiSPController::class, 'store'])->name('loaisp.store');
    Route::get('/loaisp/{id}/edit', [LoaiSPController::class, 'edit'])->name('loaisp.edit');
    Route::put('/loaisp/{id}', [LoaiSPController::class, 'update'])->name('loaisp.update');
    Route::delete('/loaisp/{id}', [LoaiSPController::class, 'destroy'])->name('loaisp.destroy');
    Route::get('/loaisp/get-slug', [LoaiSPController::class, 'getSlug'])->name('loaisp.slug');

    //2. Route san pham
    Route::get('/sanpham/index', [SanphamController::class, 'index'])->name('sanpham.index');
    Route::get('/sanpham/create', [SanphamController::class, 'create'])->name('sanpham.create');
    Route::post('/sanpham', [SanphamController::class, 'store'])->name('sanpham.store');
    Route::get('/sanpham/{id}/edit', [SanphamController::class, 'edit'])->name('sanpham.edit');
    Route::put('/sanpham/{id}', [SanphamController::class, 'update'])->name('sanpham.update');
    Route::delete('/sanpham/{id}', [SanphamController::class, 'destroy'])->name('sanpham.destroy');
    Route::get('/sanpham/get-slug', [SanphamController::class, 'getSlug'])->name('sanpham.slug');

    //3. Route thuong hieu san pham
    Route::get('/thuonghieusp/index', [ThuonghieuSPController::class, 'index'])->name('thuonghieusp.index');
    Route::get('/thuonghieusp/create', [ThuonghieuSPController::class, 'create'])->name('thuonghieusp.create');
    Route::post('/thuonghieusp', [ThuonghieuSPController::class, 'store'])->name('thuonghieusp.store');
    Route::get('/thuonghieusp/{id}/edit', [ThuonghieuSPController::class, 'edit'])->name('thuonghieusp.edit');
    Route::put('/thuonghieusp/{id}', [ThuonghieuSPController::class, 'update'])->name('thuonghieusp.update');
    Route::delete('/thuonghieusp/{id}', [ThuonghieuSPController::class, 'destroy'])->name('thuonghieusp.destroy');
    Route::get('/thuonghieusp/get-slug', [ThuonghieuSPController::class, 'getSlug'])->name('thuonghieusp.slug');


    //4. Route bai viet
    Route::get('/baiviet/index', [BaivietController::class, 'index'])->name('baiviet.index');
    Route::get('/baiviet/create', [BaivietController::class, 'create'])->name('baiviet.create');
    Route::post('/baiviet', [BaivietController::class, 'store'])->name('baiviet.store');
    Route::get('/baiviet/{id}/edit', [BaivietController::class, 'edit'])->name('baiviet.edit');
    Route::put('/baiviet/{id}', [BaivietController::class, 'update'])->name('baiviet.update');
    Route::delete('/baiviet/{id}', [BaivietController::class, 'destroy'])->name('baiviet.destroy');
    Route::get('/baiviet/get-slug', [BaivietController::class, 'getSlug'])->name('baiviet.slug');

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


    //8. Route hoadon
    // Route hiển thị danh sách đơn hàng
    Route::get('/orders', [DatHangController::class, 'index'])->name('order.index');
    //update hoadon
    Route::put('/orders/{idHD}', [DatHangController::class, 'update'])->name('order.update');
    // Route hiển thị chi tiết đơn hàng
    Route::get('orders/{idHD}/edit', [DatHangController::class, 'showOrderDetail'])->name('order.showOrderDetail');

    //9.Route contact
    Route::get('/contact/index', [ContactAdminController::class, 'index'])->name('contact.index');
    Route::get('/contact/create', [ContactAdminController::class, 'create'])->name('contact.create');
    Route::post('/contact', [ContactAdminController::class, 'store'])->name('contact.store');
    Route::get('/contact/{id}/edit', [ContactAdminController::class, 'edit'])->name('contact.edit');
    Route::put('/contact/{id}', [ContactAdminController::class, 'update'])->name('contact.update');
    Route::delete('/contact/{id}', [ContactAdminController::class, 'destroy'])->name('contact.destroy');

});

//Route profile
Route::prefix('/profile')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/order', [OrderProfileController::class, 'index'])->name('orderPersonal.index');
    Route::put('/order/{idHD}', [OrderProfileController::class, 'update'])->name('orderPersonal.update');
    Route::get('/order/{idHD}/edit', [OrderProfileController::class, 'showOrderDetail'])->name('orderPersonal.showOrderDetail');
});

require __DIR__.'/auth.php';
