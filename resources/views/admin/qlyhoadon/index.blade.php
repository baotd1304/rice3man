@extends('templates.admin.donhang')

@section('content')
<main id="main" class="main">
<div class="container">
  <div class="row">
    <div class="col-md-12">
      @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                {{ $message }}
                            </div>
                        @endif
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID Đơn hàng</th>
            <th scope="col">Người nhận</th>
            <th scope="col">Điện thoại</th>
            <th scope="col">Ngày mua</th>
            <th scope="col">Vận chuyển</th>
            <th scope="col">Thanh toán</th>
            <th scope="col">Hành động</th>
            
            <!-- Thêm các cột khác của bảng -->
          </tr>
        </thead>
        <tbody>
          @foreach ($orders as $order)
          <tr>
            <td>{{ $order->idHD }}</td>
            <td>{{ $order->tenNguoiNhan }}</td>
            <td>{{ $order->soDienThoai }}</td>
            <td>{{date('d/m/Y',strtotime($order->ngayMua))}}</td>
            <td>
              <a class="{{ $order->trangThai ? 'btn btn-success rounded-circle' : 'btn btn-secondary rounded-circle' }}">
                <i class="bi {{$order->trangThai?"bi-check-circle":"bi-x-circle"}}"></i>
              </a>
            </td>
            <td>
              <a class="{{ $order->thanhToan ? 'btn btn-success rounded-circle' : 'btn btn-secondary rounded-circle' }}">
                <i class="bi {{$order->thanhToan?"bi-check-circle":"bi-x-circle"}}"></i>
              </a>
            </td>
            <td><a href="{{ route('showhoadon.show1', $order->idHD) }}" class="btn btn-primary">Chi tiết</a></td>
            <!-- Thêm các cột khác của bảng -->
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</main>
@endsection
