@extends('templates.admin.donhang')

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
            <tr>
              <td>{{ $order1->idHD }}</td> 
              <td>{{ $order1->soLuong }}</td>
              <td>{{ $order1->tenSP }}</td>
              <td>{{ $order1->giaSP }}</td>
              <td>{{ $order->ngayMua }}</td>
              <td>{{ $tt }}</td>
              <!-- Thêm các cột khác của bảng -->
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
        <!-- Hiển thị các thông tin khác của người dùng -->
        <ul>
            <li>Trạng thái vận chuyển: {{ $order1->trangThai == 1 ? 'Đã giao hàng' : 'Chưa giao hàng' }}</li>
            <li>Trạng thái thanh toán: {{ $order1->thanhToan == 1 ? 'Đã thanh toán' : 'Chưa thanh toán' }}</li>
        </ul>
          </div>
          <div class="card-body">
            @if ($user)
            <p> Tên người dùng : {{$user->ten}}</p>
            <p> Email người mua : {{$email}}</p>
            <p> Số điện thoại người mua : {{$sdt}}</p>
            <p> Địa chỉ người mua : {{$diachi}}</p>
            @endif
            <!-- Thêm các thông tin khác của đơn hàng -->
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection