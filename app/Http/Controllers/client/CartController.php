<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\coupon;
use App\Models\MaGiamGia;
use App\Models\product;
use App\Models\SanPham;
use Illuminate\Http\Request;

class CartController extends Controller
{
  public function cart()
  {
    $cartFarmApp = [];
    $carts = [];
    $total = 0;
    $couponMsg = "";
    if (isset($_COOKIE["cartFarmApp"])) {
      $json = $_COOKIE["cartFarmApp"];
      $cartFarmApp = json_decode($json, true);

      $idList = [];
      foreach ($cartFarmApp as $item) {
        $idList[] = $item['productId'];
      }
      if (count($idList) > 0) {
        $carts = SanPham::whereIn('idSP', $idList)->get();
        for ($i = 0; $i < count($carts); $i++) {
          if ($cartFarmApp[$i]['productId'] == $carts[$i]->idSP)
            $carts[$i]->amount = $cartFarmApp[$i]['amount'];
          $total += ($carts[$i]->giaSP - ($carts[$i]->giaSP * $carts[$i]->discount / 100))* $cartFarmApp[$i]['amount'];
        }
      } else {
      }
    }
    if (isset($_COOKIE["couponCode"])) {
      $coupon = MaGiamGia::where('maGiamGia', $_COOKIE["couponCode"])->first();
      $couponCode = $_COOKIE["couponCode"];
      if ($coupon != null) {
        if ($total >= $coupon->min_condition) {
          $couponMsg = "Mã khuyến mãi đã được áp dụng";
          if ($coupon->coupon_type == 1) {
            $total = $total - $coupon->discount;
          } elseif ($coupon->coupon_type == 2) {
            $total = $total - (($total * $coupon->discount) / 100);
          } elseif ($coupon->coupon_type == 3) {
          }
        } else {
          $couponMsg = "Đơn hàng không đủ điều kiện đế sử dụng mã khuyễn mãi này";
        }
      } else {
        $couponMsg = "Mã khuyến mãi không còn tồn tại";
      }
    } else {
      $couponMsg = "";
    }
    $coupons = MaGiamGia::limit(4)->get();
    $data = [
      'carts' => $carts,
      'total' => $total,
      'couponMsg' => $couponMsg,
      "coupons" => $coupons,
    ];
    return view('client.cart.index', $data);
  }
}
