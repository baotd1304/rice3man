@extends('templates.admin.donhang')

@section('content')
<main id="main" class="main">
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID Đơn hàng</th>
            <th scope="col">Ngày mua</th>
            <th scope="col">Hành động</th>
            
            <!-- Thêm các cột khác của bảng -->
          </tr>
        </thead>
        <tbody>
          @foreach ($orders as $order)
          <tr>
            <td>{{ $order->idHD }}</td>           
            <td>{{ $order->ngayMua }}</td>
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
