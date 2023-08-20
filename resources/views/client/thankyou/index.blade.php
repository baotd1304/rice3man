@extends('client.appLayoutEmpty.index')
<title>Cảm ơn bạn đã mua hàng!</title>
@section('css')
<link rel="stylesheet" href="{{asset('css/client/thankyou.css')}}">

@endsection
@section('main-content')
  <div class="container">
    <header>
      <div class="logo">
        <img style="width:160px" src="{{asset('assets/img/logoRice3man.jpg')}}" alt="Logo">
      </div>
      <h1>Cảm ơn bạn đã mua hàng!</h1>
    </header>
    <div class="customer-info">
      <div class="confirm-info">
        <div class="confirm-line">
            <h3>Thông tin mua hàng</h3>
            <p><strong>Tên khách hàng :</strong>{{$hoaDon->tenNguoiNhan}}</p>
            <p><strong>Số điện thoại  :</strong>{{$hoaDon->soDienThoai}}</p>
            <p><strong>Email          :</strong>{{$hoaDon->email}}</p>
        </div>
         <div class="confirm-line">
            <h3>Đia chỉ giao hàng</h3>
            <p><strong>Địa chỉ   :</strong>{{$hoaDon->diaChi}}</p>
        </div>
         <div class="confirm-line">
            <h3>Thanh toán</h3>
            @if ($hoaDon->thanhToan==1)
              <p class="email">Đã thanh toán</p>
              
            @else
            <p class="email">Chưa thanh toán</p>
              
            @endif
        </div>
         <div class="confirm-line">
            <h3>Phương thức vận chuyển</h3>
            <p class="name">Giao tận nơi</p>
        </div>
    </div>
    </div>
    
    <div class="order-details">
      <!-- Hiển thị danh sách sản phẩm ở đây -->
      <div class="confirm-orderList">
        <h4>Mã đơn hàng: <span class="id-order">{{$hoaDon->idHD}}</span></h4>
        <ul class="order-list">
          <?php  $totalTemp=0  ?>
          @foreach ($hoaDon->orderDetails as $item )
          <?php  
            $totalTemp = $totalTemp + $item->giaSP*$item->soLuong;
          ?>
          <div class="order-item">
            <div class="order-item_img">
                <img src="{{asset($item->urlHinh)}}" alt="">
                <span>{{$item->soLuong}}</span>
            </div>
            <div class="order-item_txt">
                <div>
                    <p class="name">{{$item->tenSP}}</p>
                </div>
                <div class="price">{{number_format($item->giaSP,0,",",".")}} đ</div>
            </div>
        </div>
          @endforeach
          
        </ul>
        <div class="orderSumary">
          @if ($hoaDon->idMGG !=null)
            <div class="orderSumary-line">
              <span class="text">Thành tiền</span>
              <span class="price">
                {{number_format($totalTemp,0,",",".")}} đ
              </span>
            </div>
            <div class="orderSumary-line">
              <span class="text">Mã giảm giá</span>
              @if ($hoaDon->orderMGG->loaiMa == 0)
                <span class="price">
                  -{{number_format($hoaDon->orderMGG->giaTri,0,",",".")}} đ
                </span>
              @else <span class="price">
                    -{{number_format($totalTemp*$hoaDon->orderMGG->giaTri/100,0,",",".")}} đ
                  </span>
              @endif
              
            </div>
          @endif
          
          <div class="orderSumary-line total">
            <span class="text">Tổng cộng</span>
            <span class="price">
               {{number_format($hoaDon->tongTien,0,",",".")}} đ
            </span>
          </div>
        </div>
      </div>
    
      <div class="thank-you">
        <h2>Cảm ơn bạn đã mua hàng!</h2>
        <p>Xin vui lòng giữ đơn hàng của bạn cho tới khi bạn nhận được sản phẩm của mình.</p>
        <div class="d-flex  align-items-center justify-content-between">
          <a href="{{route('client')}}" style="text-decoration: underline">Trở về trang mua hàng</a>
          <button class="btn btn-primary" onclick="window.print()">In đơn hàng</button>
        </div>
      </div>
  </div>
@endsection
