
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
                                <form action="{{ route('orderPersonal.update', $order->randomString)}}" method="POST" enctype="multipart/form-data">
                                    <div class="col-lg-8 m-auto">
                                    <h5 class="m-2"><strong>Thông tin người nhận</strong></h5>
                                    <table class="col-lg-8 table table-hover table-strip table-bordered">
                                        <tr>
                                            <td class="ps-4 pe-4 col-3">Họ tên</td>
                                            <td class="ps-4 pe-4">{{ $order->tenNguoiNhan }}</td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4 pe-4">Email</td>
                                            <td class="ps-4 pe-4">{{ $order->email }}</td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4 pe-4">Số điện thoại</td>
                                            <td class="ps-4 pe-4">{{ $order->soDienThoai }}</td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4 pe-4" valign="middle">Địa chỉ</td>
                                            <td class="ps-4 pe-4">{{ $order->diaChi }}</td>
                                        </tr>
                                    </table>
            
                                    @if ($user)
                                        <hr>
                                        <h5 class="m-2"><strong>Thông tin người đặt hàng</strong></h5>
                                        <table class="table table-hover table-strip table-bordered">
                                        <tr>
                                            <td class="ps-4 pe-4 col-3">Họ tên</td>
                                            <td class="ps-4 pe-4">{{ $user->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4 pe-4">Email</td>
                                            <td class="ps-4 pe-4">{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4 pe-4">Số điện thoại</td>
                                            <td class="ps-4 pe-4">{{ $user->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4 pe-4" valign="middle">Địa chỉ</td>
                                            <td class="ps-4 pe-4">{{ $user->address }}</td>
                                        </tr>
                                        </table>
                                    @endif
                                    </div>
                                    <div class="col-lg-8 m-auto">
                                        <hr>
                                        <h5 class="m-2"><strong>Tình trạng đơn hàng</strong></h5>
                                        <table id="orderTable" class="col-lg-8 table table-hover table-strip table-bordered">
                                            <tr>
                                                <td class="ps-4 pe-4 col-3">Giao hàng</td>
                                                <td class="ps-4 pe-4">{{ $order->trangThai?"Đã giao hàng": "Chưa giao hàng" }}</td>
                                            </tr>
                                            <tr>
                                                <td class="ps-4 pe-4">Thanh toán</td>
                                                <td class="ps-4 pe-4">{{ $order->thanhToan?"Đã thanh toán": "Chưa thanh toán" }}</td>
                                            </tr>
                                            <tr>
                                                <td class="ps-4 pe-4">Trạng thái</td>
                                                <td class="ps-4 pe-4">
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
                                                </td>
                                            </tr>
                                        </table>
                                        
                                    </div>
                                        
                                        
                                    <table class="table table-hover table-strip table-bordered">
                                    <thead>
                                        <tr align="center" >
                                            <th scope="col">STT</th>
                                            <th scope="col" class="text-left">Tên sản phẩm</th>
                                            <th scope="col">Giá sản phẩm</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Hình ảnh</th>
                                            <th scope="col">Ngày mua</th>
                                            <th scope="col">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $stt = 0;
                                        $totalTemp =0;
                                        @endphp
                                        @foreach ($order1 as $order2) 
                                        @php
                                        $stt = $stt+1;
                                        @endphp
                                        <tr align="center" valign="middle ">
                                            <td>{{ $stt }}</td> 
                                            <td class="text-left"><a href="{{route('clientproduct-detail', $order2->slug)}}">{{Str::limit($order2->tenSP)}}</a></td>
                                            <td>{{ number_format($order2->giaSP, 0, ',', '.') }} đ</td>
                                            <td>{{ $order2->soLuong }}</td>
                                            <td><a href="{{route('clientproduct-detail', $order2->slug)}}"><img src="{{$order2->urlHinh}}" alt="" width="50px"></a></td>
                                            <td>{{date('d/m/Y',strtotime($order->ngayMua))}}</td>
                                            <td>{{ number_format($order2->soLuong * $order2->giaSP, 0, ',', '.') }} đ</td>
                                            <?php $totalTemp += $order2->soLuong * $order2->giaSP; ?>
                                        </tr>
                                        @endforeach
                                        @if ($stt >1)
                                            <tr align="center">
                                                <td colspan="6">Tạm tính</td>
                                                <td> {{ number_format($totalTemp, 0, ',', '.') }} đ</td>
                                            </tr>
                                        @endif
                                            
                                        @if ($order->idMGG != '')
                                            <tr align="center">
                                                <td colspan="6">Mã giảm giá</td>
                                                @if ($mgg->loaiMa == 0)
                                                    <td> -{{ number_format($mgg->giaTri, 0, ',', '.') }} đ</td>
                                                @else <td> -{{ number_format($totalTemp*$mgg->giaTri/100, 0, ',', '.') }} đ</td>
                                                @endif
                                                
                                            </tr>
                                        @endif
                                        
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
