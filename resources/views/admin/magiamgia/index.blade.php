@extends('templates.admin.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Mã giảm giá</h1>
            <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('magiamgia.index') }}">Mã giảm giá</a></li>
                <li class="breadcrumb-item active">Danh sách mã giảm giá</li>
            </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
            <div class="col-lg-12">
                
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">Danh sách mã giảm giá</div>
                        <div class="adding">
                            <a href="{{ route('magiamgia.create') }}"><i class="bi bi-plus-circle-fill fs-2"></i></a>
                        </div>
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
                                <tr >
                                    <th scope="col">ID</th>
                                    <th scope="col">Mã giảm giá</th>
                                    <th scope="col">Loại mã</th>
                                    <th scope="col">Giá trị</th>
                                    <th scope="col">Điều kiện ≥ </th>
                                    <th scope="col">Lượt sử dụng</th>
                                    {{-- <th scope="col">Ngày bắt đầu</th> --}}
                                    {{-- <th scope="col">Ngày kết thúc</th> --}}
                                    <th scope="col">Thời hạn</th>
                                    <th scope="col">Hoạt động</th>
                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody valign="middle">
                                @foreach ($listmgg as $mgg)
                                    <tr>
                                        <td> {{$mgg->idMGG}} </td>
                                        <td> {{$mgg->maGiamGia}} </td>
                                        <td>
                                             {{$mgg->loaiMa?'giảm theo %':'giảm số tiền'}} 
                                        </td>
                                        <td>    
                                            {{$mgg->loaiMa? $mgg->giaTri.' %' : number_format($mgg->giaTri,0,',','.'). ' đ'}}
                                        </td>
                                        <td> {{$mgg->dieuKien? ''. number_format($mgg->dieuKien,0,',','.'). ' đ' :'0 đ'}} </td>
                                        <td>
                                             {{$mgg->luotSuDung? $mgg->luotSuDung : '0'}} /
                                             @if ($mgg->gioiHan=='')
                                             <i class="bi bi-infinity"></i>
                                             @else {{$mgg->gioiHan}}
                                             @endif
                                        </td>
                                        {{-- <td>{{$mgg->ngayBatDau}}</td> --}}
                                        {{-- <td>{{$mgg->ngayKetThuc}}</td> --}}
                                        <td>
                                            @if ($mgg->ngayKetThuc=='')
                                             <i class="bi bi-infinity"></i>
                                            @elseif (strtotime($mgg->ngayKetThuc) < strtotime(now(+7))) Hết hạn
                                            @else  {{date('d',strtotime($mgg->ngayKetThuc) - strtotime(now(+7)))}} ngày
                                            @endif
                                        </td>
                                        <td>
                                            <a class="{{ $mgg->hoatDong ? 'btn btn-success rounded-circle' : 'btn btn-secondary rounded-circle' }}">
                                                <i class="bi {{$mgg->hoatDong?"bi-check-circle":"bi-x-circle"}}"></i>
                                            </a>
                                        </td>
                                        <td class="align-middle text-center">
                                            <form action="/admin/magiamgia/{{$mgg->idMGG}}" method="post">
                                                <a href="/admin/magiamgia/{{$mgg->idMGG}}/edit" class="btn btn-primary rounded-circle"><i class="bi bi-pencil-square"></i></a>            
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
                        {{-- <div> {{ $listmgg->onEachSide(5)->links()}} </div>  --}}
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
            </div>
        </section>
    </main>
@endsection
