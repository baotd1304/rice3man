@extends('templates.admin.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Hóa đơn</h1>
            <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('order.index') }}">Hóa đơn</a></li>
                <li class="breadcrumb-item active">Chi tiết hóa đơn</li>
            </ol>
            </nav>
        </div><!-- End Page Title -->

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
                        <form action="{{ route('order.update', $order->idHD) }}" method="POST" enctype="multipart/form-data">
                          <div class="col-lg-8 m-auto">
                          <h5 class="mt-3"><strong>Thông tin người nhận</strong></h5>
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
                            <h5><strong>Thông tin người đặt hàng</strong></h5>
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
                                <td>{{ $user->name }}</td>
                              </tr>
                              <tr>
                                <td valign="middle">Địa chỉ</td>
                                <td>{{ $user->address }}</td>
                              </tr>
                            </table>
                          @endif
                        </div>
                            <!-- Thêm các thông tin khác của đơn hàng -->
                            <div class="m-auto col-lg-8 mb-3" style="display: flex; justify-content: space-between">
                              <div class="">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                  <input value="1" type="radio" class="btn-check" name="trangThai" id="btnradio1" autocomplete="off" {{$order->trangThai?"checked":""}}>
                                  <label class="btn btn-outline-primary" for="btnradio1">Đã giao hàng</label>
                                
                                  <input value="0" type="radio" class="btn-check" name="trangThai" id="btnradio2" autocomplete="off" {{$order->trangThai?"":"checked"}}>
                                  <label class="btn btn-outline-secondary" for="btnradio2">Chưa giao hàng</label>
                                </div>
                              </div>
                              <div class="">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                  <input value="1" type="radio" class="btn-check" name="thanhToan" id="btnradio3" autocomplete="off" {{$order->thanhToan?"checked":""}}>
                                  <label class="btn btn-outline-primary" for="btnradio3">Đã thanh toán</label>
                                
                                  <input value="0" type="radio" class="btn-check" name="thanhToan" id="btnradio4" autocomplete="off" {{$order->thanhToan?"":"checked"}}>
                                  <label class="btn btn-outline-secondary" for="btnradio4">Chưa thanh toán</label>
                                </div>
                              </div>
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
                          <button type="submit" class="btn btn-primary">Cập nhật</button>
                          <a type="cancle" href="{{route('order.index')}}" class="btn btn-outline-dark ml-3">Hủy</a>
                        </div>
                      
                        @csrf {{ method_field('PUT') }}
                      </div>
                    </form>

                      </div>
                    </div>
    
                </div>
                </div>
            </section>
        </main><!-- End #main -->
    
    @endsection
    


