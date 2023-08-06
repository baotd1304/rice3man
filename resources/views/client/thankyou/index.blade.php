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
            <p class="name">Giao Tận nơi</p>
        </div>
    </div>
    </div>
    
    <div class="order-details">
      <!-- Hiển thị danh sách sản phẩm ở đây -->
      <div class="confirm-orderList">
        <h4>Đơn hàng <span class="id-order">{{$hoaDon->id}}</h4>
        <ul class="order-list">
          @foreach ($hoaDon->orderDetails as $item )
          <div class="order-item">
            <div class="order-item_img">
                <img src="{{asset($item->urlHinh)}}" alt="">
                <span>{{$item->soLuong}}</span>
            </div>
            <div class="order-item_txt">
                <div>
                    <p class="name">{{$item->tenSP}}</p>
                </div>
                <div class="price">{{number_format($item->giaSP,0,",",".")}} vnđ</div>
            </div>
        </div>
          @endforeach
          
        </ul>
        <div class="orderSumary">
          <div class="orderSumary-line total">
            <span class="text">Tổng cộng</span>
            <span class="price">
               {{number_format($hoaDon->tongTien,0,",",".")}} vnđ
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
