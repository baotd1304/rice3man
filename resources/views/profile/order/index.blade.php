
@extends('client.appLayout.index')


@section('main-content')

<x-app-layout>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <section class="section">
                    <div class="row">
                    <div class="col-lg-12">
        
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div class="card-title">Lịch sử mua hàng</div>
                            </div>
                            <div class="card-body">
                                
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        {{ $message }}
                                    </div>
                                @endif
                                <!-- Table with stripped rows -->
                                <table class="table datatable table-hover table-strip table-bordered">
                                    <thead align="center">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col" class="text-left">Người nhận</th>
                                            <th scope="col">Điện thoại</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Tổng tiền</th>
                                            <th scope="col">Ngày mua</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Vận chuyển</th>
                                            <th scope="col">Thanh toán</th>
                                            <th scope="col">Xem chi tiết</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orderPersonal as $order)
                                            <tr align="center">
                                                <td class="align-middle"> {{$order->idHD}} </td>
                                                <td class="align-middle text-left">{{$order->tenNguoiNhan}}</td>
                                                <td class="align-middle"> {{$order->soDienThoai}} </td>
                                                <td class="align-middle"> {{$order->email}} </td>
                                                <td class="align-middle"> {{number_format($order->tongTien,0,",",".")}} đ</td>
                                                <td class="align-middle"> {{date('d/m/Y',strtotime($order->ngayMua))}} </td>
                                                <td class="align-middle">
                                                    <span class="badge 
                                                    @if ($order->isDone==0) bg-secondary
                                                    @elseif ($order->isDone==1) bg-info
                                                    @elseif ($order->isDone==2) bg-success
                                                    @elseif ($order->isDone==3) bg-danger
                                                    @endif
                                                ">
                                                    @if ($order->isDone==0) Chưa xác nhận
                                                    @elseif ($order->isDone==1) Đã xác nhận
                                                    @elseif ($order->isDone==2) Đã hoàn thành
                                                    @elseif ($order->isDone==3) Đã hủy
                                                    @endif
                                                </span>
                                                </td>
                                                <td class="align-middle">
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
                                                    <a href="{{route('orderPersonal.showOrderDetail', $order->idHD)}}" class="btn btn-primary rounded-circle"><i class="bi bi-pencil-square"></i></a>            
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
                                <div> {{ $orderPersonal->onEachSide(5)->links()}} </div> 
                                <!-- End Table with stripped rows -->
        
                            </div>
                        </div>
        
                    </div>
                    </div>
                </section>
                

            </div>
        
        </div>
    </div>

</x-app-layout>

@endsection

<style>
    .app__header{
        max-width: 1300px;
        margin: auto;
    }
    footer .section-policy, .container, .foo-mid, .foo_bot{
        max-width: 1300px !important;
        margin: auto;
    }
    footer .foo_bot{
        position: relative;
    }
    .pagination{
        justify-content: center;
    }
</style>
