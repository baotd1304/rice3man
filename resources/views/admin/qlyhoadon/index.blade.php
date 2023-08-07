@extends('templates.admin.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Hóa đơn</h1>
            <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('sanpham.index') }}">Hóa đơn</a></li>
                <li class="breadcrumb-item active">Danh sách hóa đơn</li>
            </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">Danh sách hóa đơn</div>
                    </div>
                    <div class="card-body">
                        
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                {{ $message }}
                            </div>
                        @endif
                        <!-- Table with stripped rows -->
                        <table class="table datatable table-hover table-strip table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">ID</th>
                                    <th scope="col">Người nhận</th>
                                    <th scope="col">Điện thoại</th>
                                    <th scope="col" class="text-center">Tổng tiền</th>
                                    <th scope="col" class="text-center">Ngày mua</th>
                                    <th scope="col" class="text-center">Trạng thái</th>
                                    <th scope="col" class="text-center">Vận chuyển</th>
                                    <th scope="col" class="text-center">Thanh toán</th>
                                    <th scope="col" class="text-center" style="text-align: center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                      <td class="align-middle text-center"> {{$order->idHD}} </td>
                                      <td class="align-middle">{{$order->tenNguoiNhan}}</td>
                                      <td class="align-middle text-center"> {{$order->soDienThoai}} </td>
                                      <td class="align-middle text-center"> {{number_format($order->tongTien,0,",",".")}} </td>
                                        <td class="align-middle text-center"> {{date('d/m/Y',strtotime($order->ngayMua))}} </td>
                                        <td class="align-middle text-center">
                                            @if ($order->isDone==0) Chưa xác nhận
                                            @elseif ($order->isDone==1) Đã xác nhận
                                            @elseif ($order->isDone==2) Đã hoàn thành
                                            @elseif ($order->isDone==3) <p style="color: red">Đã hủy</p>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center">
                                            <a class="{{ $order->trangThai ? 'btn btn-success rounded-circle' : 'btn btn-secondary rounded-circle' }}">
                                                <i class="bi {{$order->trangThai?"bi-check-circle":"bi-x-circle"}}"></i>
                                            </a>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a class="{{ $order->thanhToan ? 'btn btn-success rounded-circle' : 'btn btn-secondary rounded-circle' }}">
                                                <i class="bi {{$order->thanhToan?"bi-check-circle":"bi-x-circle"}}"></i>
                                            </a>
                                        </td>
                                        <td class="align-middle text-center">
                                            <form action="{{route('order.update', $order->idHD)}}" method="post">
                                                <a href="{{route('order.showOrderDetail', $order->idHD)}}" class="btn btn-primary rounded-circle"><i class="bi bi-pencil-square"></i></a>            
                                                <button onclick="return confirm('Xác nhận xóa?')" class="btn btn-danger rounded-circle" type="submit"><i class="bi bi-trash"></i></button>
                                                @csrf  @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                
                                @endforeach
                            </tbody>

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                
                        </table>
                        {{-- <div> {{ $listsp->onEachSide(5)->links()}} </div>  --}}
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
            </div>
        </section>
    </main><!-- End #main -->

@endsection

