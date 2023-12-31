<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Mail\SendVerifyCodeMail;
use App\Models\chitietdonhang;
use App\Models\MaGiamGia;
use App\Models\order;
use App\Models\order_temp;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\TryCatch;

class PaymentController extends Controller
{
  protected $couponEligibleForUse = false;
  public function index()
  {
    $cartFarmApp = [];
    $carts = [];
    $total = 0;
    $totalTemp = 0;
    $couponMsgSuccess = "";
    $couponMsgError = "";
    $couponCode = "";
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
          $total += ($carts[$i]->giaSP - ($carts[$i]->giaSP * $carts[$i]->discount / 100)) * $cartFarmApp[$i]['amount'];
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
              $couponMsgError = "Đơn hàng không đủ điều kiện đế sử dụng mã khuyễn mãi này.
                  Vui lòng mua thêm ".number_format($coupon->dieuKien - $total, 0, ',','.'). ' vnđ để được hưởng khuyến mãi';
            }
      } else {
        $couponMsgError = "Mã khuyến mãi không tồn tại";
      }
    } else {
      $couponMsgError = "Đơn hàng này chưa áp dụng mã khuyến mãi";
    }
    $data = [
      'carts' => $carts,
      'total' => $total,
      'totalTemp' => $totalTemp,
      'couponMsgSuccess' => $couponMsgSuccess,
      'couponMsgError' => $couponMsgError,
      'couponCode' => $couponCode,
      'coupon' => $coupon,
      'couponEligibleForUse' => $this->couponEligibleForUse,
      
    ];
    return view('client.payment.index', $data);
  }


  //  CHỨC NĂNG THANH TOÁN VỚI VNPAY
  public function create_payment_vnpay_e(PaymentRequest $request)
  {
    $order_code = rand(0000, 9999);
    session(['cost_id' => $order_code]);
    session(['url_prev' => url()->previous()]);
    $order_temp = new order_temp();
    $order_temp->idND = $request->idND;
    $order_temp->idMGG = $request->idMGG;
    $order_temp->user_name = $request->username;
    $order_temp->email = $request->email;
    $order_temp->phone = $request->phone;
    $order_temp->address = $request->address;
    $order_temp->province = $request->province;
    $order_temp->district = $request->district;
    $order_temp->ward = $request->ward;
    $order_temp->customer_note = $request->order_note;
    $order_temp->payment_type = 'ATM';
    $order_temp->total = $request->total;
    $order_temp->fee_ship = $request->fee_ship;
    $order_temp->save();
    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = route('clientreturn_payment_vnpay', [
      "data" => [
        "id" => $order_temp->id,
        "order_code" => $order_code
      ]
    ]);
    $vnp_TmnCode = "Q57HT4LD"; //Mã website tại VNPAY 
    $vnp_HashSecret = "ZNJZVKHJSPIOYDYRREQVECNZELACJGDZ"; //Chuỗi bí mật
    $vnp_TxnRef = $order_code; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
    $vnp_OrderInfo = "Thanh toán vnpay";
    $vnp_OrderType = 'billpayment';
    $vnp_Amount = $request->total * 100;
    $vnp_Locale = "vn";
    $vnp_BankCode = "";
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];



    $inputData = array(
      "vnp_Version" => "2.1.0",
      "vnp_TmnCode" => $vnp_TmnCode,
      "vnp_Amount" => $vnp_Amount,
      "vnp_Command" => "pay",
      "vnp_CreateDate" => date('YmdHis'),
      "vnp_CurrCode" => "VND",
      "vnp_IpAddr" => $vnp_IpAddr,
      "vnp_Locale" => $vnp_Locale,
      "vnp_OrderInfo" => $vnp_OrderInfo,
      "vnp_OrderType" => $vnp_OrderType,
      "vnp_ReturnUrl" => $vnp_Returnurl,
      "vnp_TxnRef" => $vnp_TxnRef,
    );

    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
      $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
      $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    }

    //var_dump($inputData);
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
      if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
      } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
      }
      $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }
    // $data="user_name"."=".$request->user_name. '&'."email"."=".$request->email. '&'."phone"."=".$request->phone. '&'."address"."=".$request->address. '&'."province"."=".$request->province. '&'."district"."=".$request->district. '&'."ward"."=".$request->ward. '&'."order_note"."=".$request->order_note;
    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
      $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
      $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    $returnData = array(
      'code' => '00', 'message' => 'success', 'data' => $vnp_Url
    );
    return redirect($vnp_Url);
  }
  public function return_payment_vnpay_e(Request $request)
  {

    try {
      $url = session('url_prev', '/');
      if ($request->vnp_ResponseCode == "00") {
        $data = $request->data;
        $cartFarmApp = [];
        if (isset($_COOKIE["cartFarmApp"])) {
          $json = $_COOKIE["cartFarmApp"];
          $cartFarmApp = json_decode($json, true);
        }
        $order_temp = order_temp::where("id", $data['id'])->first();
        $order = new order();
        $order->trangThai = 0;
        $order->thanhToan = 1;
        $order->isDone = 0;
        $order->tongTien = $order_temp->total;
        $order->idMGG = $order_temp->idMGG;
        $order->idND = $order_temp->idND;
        $order->tenNguoiNhan = $order_temp->user_name;
        $order->email = $order_temp->email;
        $order->soDienThoai = $order_temp->phone;
        $order->diaChi = $order_temp->address.", ".$order_temp->ward.", ".$order_temp->district.", ".$order_temp->province;
        $order->randomString = Str::random(10);
        $order->save();
        foreach ($cartFarmApp as $item) {
          // Fetch the product information from the database
          $sanPham = SanPham::find($item['productId']);
          $chiTietHoaDon = new chitietdonhang();
          $chiTietHoaDon->idHD = $order->idHD;
          $chiTietHoaDon->idSP = $item['productId'];
          $chiTietHoaDon->tenSP = $sanPham->tenSP;
          $chiTietHoaDon->urlHinh = $sanPham->urlHinh;
          $chiTietHoaDon->giaSP = $sanPham->giaSP - ($sanPham->giaSP * $sanPham->discount / 100);
          $chiTietHoaDon->urlHinh = $sanPham->urlHinh;
          $chiTietHoaDon->soLuong = $item['amount'];
          $chiTietHoaDon->save();
          // $sanPham->slBanra = $sanPham->slMuavao + $item['amount'];
          // $sanPham->save();
        }
        $coupon = MaGiamGia::where('idMGG', $order_temp->idMGG)->first();
        if ($coupon != null) {
          $coupon->luotSuDung = $coupon->luotSuDung+1;
          $coupon->save();
        }
        $order_temp = order_temp::where("id", $data["id"])->delete();
        setcookie('cartFarmApp', json_encode([]), time() + 3 * 24 * 60 * 60, '/');
        setcookie('couponCode', null, time() - 3 * 24 * 60 * 60, '/');
        $mail = new SendVerifyCodeMail(0000);
        Mail::to($order->email)->send($mail);
        return redirect()->route('clientpage-thanks', $order->randomString);
        return redirect($url)->with('success', 'Đã thanh toán phí dịch vụ');
      }
      session()->forget('url_prev');
      dd('thất bại');
      // quay sang một trang lỗi nào đó
      return redirect($url)->with('errors', 'Lỗi trong quá trình thanh toán phí dịch vụ');
    } catch (\Throwable $th) {
      throw $th;
    }
  }
  public function create_payment_cod(PaymentRequest $request)
  {

      $cartFarmApp = [];
      $order_code = mt_rand(1000, 9999);
      if (isset($_COOKIE["cartFarmApp"])) {
        $json = $_COOKIE["cartFarmApp"];
        $cartFarmApp = json_decode($json, true);
      }
      $hoaDon = new order();
      $hoaDon->idND = $request->idND;
      $hoaDon->idMGG = $request->idMGG;
      $hoaDon->tenNguoiNhan = $request->username;
      $hoaDon->email = $request->email;
      $hoaDon->soDienThoai = $request->phone;
      $hoaDon->diaChi = $request->address.", ".$request->ward.", ".$request->district.", ".$request->province;
      $hoaDon->trangThai = 0;
      $hoaDon->thanhToan = 0;
      $hoaDon->isDone = 0;
      $hoaDon->tongTien = $request->total;
      $hoaDon->randomString = Str::random(10);
      $hoaDon->save();
      foreach ($cartFarmApp as $item) {
        // Fetch the product information from the database
        $sanPham = SanPham::find($item['productId']);
        $chiTietHoaDon = new chitietdonhang();
        $chiTietHoaDon->idHD = $hoaDon->idHD;
        $chiTietHoaDon->idSP = $item['productId'];
        $chiTietHoaDon->tenSP = $sanPham->tenSP;
        $chiTietHoaDon->urlHinh = $sanPham->urlHinh;
        $chiTietHoaDon->giaSP = $sanPham->giaSP - ($sanPham->giaSP * $sanPham->discount / 100);
        $chiTietHoaDon->soLuong = $item['amount'];
        $chiTietHoaDon->save();
      }

      $coupon = MaGiamGia::where('idMGG', $request->idMGG)->first();
      if ($coupon != null) {
            $coupon->luotSuDung = $coupon->luotSuDung+1;
            $coupon->save();
      }
      setcookie('cartFarmApp', json_encode([]), time() - 3 * 24 * 60 * 60, '/');
      setcookie('couponCode', null, time() - 3 * 24 * 60 * 60, '/');
      $mail = new SendVerifyCodeMail(0000);
      Mail::to($hoaDon->email)->send($mail);
      return redirect()->route('clientpage-thanks', $hoaDon->randomString);
  }

  public function thanks($randomString)
  {
    $hoaDon = order::where('randomString', $randomString)->first();
    $data = [
      "hoaDon" => $hoaDon
    ];
    // dd($hoaDon);
    return view('client.thankyou.index', $data);
  }
}
