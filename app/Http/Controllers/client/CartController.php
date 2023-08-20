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
  protected $couponEligibleForUse = false;
  public function cart()
  {
    $cartFarmApp = [];
    $carts = [];
    $total = 0;
    $totalTemp = 0;
    $couponMsgSuccess = "";
    $couponMsgError = "";
    $coupon = "";
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
        $totalTemp = $total;
      } else {
      }
    }
    if (isset($_COOKIE["couponCode"])) {
      $coupon = MaGiamGia::where('maGiamGia', $_COOKIE["couponCode"])
              ->where('hoatDong', 1)
              ->first();
      $couponCode = $_COOKIE["couponCode"];
      if ($coupon != null) {
        if (($coupon->ngayBatDau != '' && $coupon->ngayBatDau > now(+7)) || ($coupon->ngayKetThuc != '' && $coupon->ngayKetThuc < now(+7))){
          $couponMsgError = "Mã khuyến mãi không còn hiệu lực";
        } else
          if ($total >= $coupon->dieuKien) {
            if (($coupon->gioiHan == null) || ($coupon->luotSuDung < $coupon->gioiHan) ) {
              $this->couponEligibleForUse = true;
              $couponMsgSuccess = "Mã khuyến mãi đã được áp dụng";
              if ($coupon->loaiMa == 0) {
                $total = $total - $coupon->giaTri;
              } elseif ($coupon->loaiMa == 1) {
                $total = $total - (($total * $coupon->giaTri) / 100);
              }
            } else {
              $couponMsgError = "Mã khuyến mãi đã hết lượt sử dụng";
            }
          } else {
            $couponMsgError = "Đơn hàng không đủ điều kiện để sử dụng mã khuyễn mãi: ".$couponCode.'. Vui lòng mua thêm '.number_format($coupon->dieuKien - $total, 0, ',','.'). ' vnđ để được hưởng khuyến mãi.' ;
          }
      } else {
        $couponMsgError = "Mã khuyến mãi không còn tồn tại";
      }
    } else {
      $couponMsgError = "";
    }
    $coupons = MaGiamGia::limit(4)->get();
    $data = [
      'carts' => $carts,
      'total' => $total,
      'totalTemp' => $totalTemp,
      'couponMsgSuccess' => $couponMsgSuccess,
      'couponMsgError' => $couponMsgError,
      "coupons" => $coupons,
      "coupon" => $coupon,
      'couponEligibleForUse' => $this->couponEligibleForUse,
    ];
    return view('client.cart.index', $data);
  }
}
