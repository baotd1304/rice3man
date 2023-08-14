@extends('templates.admin.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Sản phẩm</h1>
            <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('sanpham.index') }}">Sản phẩm</a></li>
                <li class="breadcrumb-item active">Danh sách sản phẩm</li>
            </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">Danh sách sản phẩm</div>
                        <div class="adding">
                            <a href="{{ route('sanpham.create') }}"><i class="bi bi-plus-circle-fill fs-2"></i></a>
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
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">ID</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Loại sản phẩm</th>
                                    {{-- <th scope="col">Thương hiệu</th> --}}
                                    <th scope="col" class="text-center">Giá</th>
                                    <th scope="col" class="text-center">Hình ảnh</th>
                                    <th scope="col" class="text-center">Ngày đăng</th>
                                    <th scope="col" class="text-center">Hiển thị</th>
                                    <th scope="col" class="text-center">Nổi bật</th>
                                    <th scope="col" class="text-center" style="text-align: center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listsp as $sp)
                                    <tr>
                                        <td class="align-middle text-center"><a href="{{route('clientproduct-detail', $sp->slug)}}"> {{$sp->idSP}} </a></td>
                                        <td class="align-middle"> {{Str::limit($sp->tenSP, 30)}} </td>
                                        <td class="align-middle">{{$sp->tenLoai}}</td>
                                        {{-- <td class="align-middle">{{$sp->tenTH}}</td> --}}
                                        <td class="align-middle text-center"> {{number_format($sp->giaSP,0,",",".")}} </td>
                                        <td class="align-middle text-center"><img src="{{$sp->urlHinh}}" alt="" width="50px"></td>
                                        <td class="align-middle text-center"> {{date('d/m/Y',strtotime($sp->ngayDang))}} </td>
                                        {{-- <td class="align-middle text-center"> {{ Str::limit($sp->moTa, 23) }} </td> --}}
                                        <td class="align-middle text-center">
                                            <a class="{{ $sp->anHien ? 'btn btn-success rounded-circle' : 'btn btn-secondary rounded-circle' }}">
                                                <i class="bi {{$sp->anHien?"bi-check-circle":"bi-x-circle"}}"></i>
                                            </a>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a class="{{ $sp->noiBat ? 'btn btn-success rounded-circle' : 'btn btn-secondary rounded-circle' }}">
                                                <i class="bi {{$sp->noiBat?"bi-check-circle":"bi-x-circle"}}"></i>
                                            </a>
                                        </td>
                                        <td class="align-middle text-center">
                                            <form action="/admin/sanpham/{{$sp->idSP}}" method="post">
                                                <a href="/admin/sanpham/{{$sp->idSP}}/edit" class="btn btn-primary rounded-circle"><i class="bi bi-pencil-square"></i></a>            
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

