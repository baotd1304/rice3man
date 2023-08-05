@extends('templates.admin.donhang')
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* CSS cho phần card-header */
    .card-header {
      background-color: #f2f2f2;
      padding: 10px;
      border-bottom: 1px solid #ddd;
      padding-bottom: 15px;
    }
  
    .card-header ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    strong{
      color: black;
    }
  
    .card-header li {
      margin-bottom: 5px;
      font-size: 16px;
    }
  
    /* CSS cho phần card-body */
    .card-body {
      padding: 10px;
      padding-bottom: 15px;
    }
  
    .card-body p {
      margin: 0;
      font-size: 14px;
    }
  
   
    .text-right {
      text-align: right;
    }
  </style>
</head>
@section('show')
<main id="main" class="main">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
      <a href="{{ route('chitiethoadon.index') }}" class="btn btn-primary mb-3">Quay lại</a>

        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Số lượng</th>
              <th scope="col">Tên sản phẩm</th>
              <th scope="col">Giá sản phẩm</th>
              <th scope="col">Ngày mua</th>
              <th scope="col">Tổng tiền</th>
              
              <!-- Thêm các cột khác của bảng -->
            </tr>
          </thead>
          <tbody>
            @foreach ($order1 as $order2)
            <tr>
              <td>{{ $order2->idCTHD }}</td> 
              <td>{{ $order2->soLuong }}</td>
              <td>{{ $order2->tenSP }}</td>
              <td>{{ number_format($order2->giaSP, 0, ',', '.') }} đ</td>

              <td>{{ $order->ngayMua }}</td>
              <td>{{ number_format($order2->soLuong * $order2->giaSP, 0, ',', '.') }} đ</td>
              <!-- Thêm các cột khác của bảng -->
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <h1 style="text-align: center">Thông tin hóa đơn</h1>
          <hr>
          <div class="card" >
            
            <div class="card-header">
              <!-- Hiển thị các thông tin khác của người dùng -->
              <ul class="list-unstyled">
                <li><strong>Tên người nhận:</strong> {{ $order->tenNguoiNhan }}</li>
                <br>
                <li><strong>Email người nhận:</strong> {{ $order->email }}</li><br>
                <li><strong>Địa chỉ người nhận:</strong> {{ $order->diaChi }}</li><br>
                <li><strong>Số điện thoại người nhận:</strong> {{ $order->soDienThoai }}</li><br>
                <li><strong>Trạng thái vận chuyển:</strong> {{ $order->trangThai == 1 ? 'Đã giao hàng' : 'Chưa giao hàng' }}</li><br>
                <li><strong>Trạng thái thanh toán:</strong> {{ $order->thanhToan == 1 ? 'Đã thanh toán' : 'Chưa thanh toán' }}</li><br>
              </ul>
            </div>
            <div class="card-body">
              @if ($user)
              <p><strong>Tên người dùng:</strong> {{ $user->ten }}</p>
              <p><strong>Email người mua:</strong> {{ $email }}</p>
              <p><strong>Số điện thoại người mua:</strong> {{ $sdt }}</p>
              <p><strong>Địa chỉ người mua:</strong> {{ $diachi }}</p>
              @endif
              <!-- Thêm các thông tin khác của đơn hàng -->
            </div>
          </div>
      </div>
    </div>
  </div>
</main>
@endsection
