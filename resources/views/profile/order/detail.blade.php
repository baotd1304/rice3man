
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
                                <div class="card-title">Chi tiết hóa đơn</div>
                                <div class="adding">
                                  Mã hóa đơn: {{ $order->idHD}}
                                </div>
                            </div>
                            <div class="card-body">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        {{ $message }}
                                    </div>
                                @endif
                                <form action="{{ route('orderPersonal.update', $order->idHD)}}" method="POST" enctype="multipart/form-data">
                                    <div class="col-lg-8 m-auto">
                                    <h5 class="m-2"><strong>Thông tin người nhận</strong></h5>
                                    <table class="col-lg-8 table table-hover table-strip table-bordered">
                                        <tr>
                                        <td class="col-md-3">Họ tên</td>
                                        <td class="col-md-9">{{ $order->tenNguoiNhan }}</td>
                                        </tr>
                                        <tr>
                                        <td>Email</td>
                                        <td>{{ $order->email }}</td>
                                        </tr>
                                        <tr>
                                        <td>Số điện thoại</td>
                                        <td>{{ $order->soDienThoai }}</td>
                                        </tr>
                                        <tr>
                                        <td valign="middle">Địa chỉ</td>
                                        <td>{{ $order->diaChi }}</td>
                                        </tr>
                                    </table>
            
                                    @if ($user)
                                        <hr>
                                        <h5 class="m-2"><strong>Thông tin người đặt hàng</strong></h5>
                                        <table class="table table-hover table-strip table-bordered">
                                        <tr>
                                            <td class="col-md-3">Họ tên</td>
                                            <td class="col-md-9">{{ $user->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Số điện thoại</td>
                                            <td>{{ $user->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td valign="middle">Địa chỉ</td>
                                            <td>{{ $user->address }}</td>
                                        </tr>
                                        </table>
                                    @endif
                                    </div>
                                        <div class="col-lg-8 m-auto">
                                            <hr>
                                            <h5 class="m-2"><strong>Tình trạng đơn hàng</strong></h5>
                                            <table class="col-lg-8 table table-hover table-strip table-bordered">
                                                <tr>
                                                    <td class="col-md-3">Giao hàng</td>
                                                    <td class="col-md-9">{{ $order->trangThai?"Đã giao hàng": "Chưa giao hàng" }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Thanh toán</td>
                                                    <td>{{ $order->thanhToan?"Đã thanh toán": "Chưa thanh toán" }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Trạng thái</td>
                                                    <td>
                                                        @if ($order->isDone==0) Chưa xác nhận
                                                        @elseif ($order->isDone==1) Đã xác nhận
                                                        @elseif ($order->isDone==2) Đã hoàn thành
                                                        @elseif ($order->isDone==3) <p style="color: red">Đã hủy</p>
                                                        @endif
                                                    </td>
                                                </tr>
                                            </table>
                                            
                                        </div>
                                        
                                        
                                    <table class="table table-hover table-strip table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="align-middle text-center">STT</th>
                                            <th scope="col" class="align-middle">Tên sản phẩm</th>
                                            <th scope="col" class="align-middle text-center">Giá sản phẩm</th>
                                            <th scope="col" class="align-middle text-center">Số lượng</th>
                                            <th scope="col" class="align-middle text-center">Hình ảnh</th>
                                            <th scope="col" class="align-middle text-center">Ngày mua</th>
                                            <th scope="col" class="align-middle text-center">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $stt = 0;
                                        @endphp
                                        @foreach ($order1 as $order2) 
                                        @php
                                        $stt = $stt+1;
                                        @endphp
                                        <tr>
                                        <td class="align-middle text-center">{{ $stt }}</td> 
                                        <td class="align-middle">{{Str::limit($order2->tenSP, 30)}}</td>
                                        <td class="align-middle text-center">{{ number_format($order2->giaSP, 0, ',', '.') }} đ</td>
                                        <td class="align-middle text-center">{{ $order2->soLuong }}</td>
                                        <td class="align-middle text-center"><img src="{{$order2->urlHinh}}" alt="" width="50px"></td>
                                        <td class="align-middle text-center">{{date('d/m/Y',strtotime($order->ngayMua))}}</td>
                                        <td class="align-middle text-center">{{ number_format($order2->soLuong * $order2->giaSP, 0, ',', '.') }} đ</td>
                                        <!-- Thêm các cột khác của bảng -->
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot align="center" style="font-weight: bolder">
                                        <tr>
                                        <td colspan="6">Tổng cộng</td>
                                        <td>{{ number_format($order->tongTien, 0, ',', '.') }} đ</td>
                                        </tr>
                                    </tfoot>
            
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
                                    <div class="pb-3 pt-3">
                                    <input type="number" value="3" name="isDone" hidden>
                                    <button type="submit" class="btn btn-warning" {{$order->isDone?"disabled":""}}>Hủy đơn hàng</button>
                                    <a type="cancle" href="{{route('orderPersonal.index')}}" class="btn btn-info ml-3">Quay lại</a>
                                    </div>
                                    <p style="font-size: 14px; color: red">*Bạn chỉ có thể hủy đơn hàng khi đơn hàng chưa được xác nhận</p>
                                
                                    @csrf {{ method_field('PUT') }}
                                </div>
                                </form>
        
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
