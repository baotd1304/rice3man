@extends('templates.admin.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Loại sản phẩm</h1>
            <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('loaisp.index') }}">Loại sản phẩm</a></li>
                <li class="breadcrumb-item active">Danh sách loại sản phẩm</li>
            </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
            <div class="col-lg-12">
                
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">Danh sách loại sản phẩm</div>
                        <div class="adding">
                            <a href="{{ route('loaisp.create') }}"><i class="bi bi-plus-circle-fill fs-2"></i></a>
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
                                    <th scope="col">Tên loại sản phẩm</th>
                                    <th scope="col" class="text-center">Thứ tự</th>
                                    <th scope="col" class="text-center">Hiển thị</th>
                                    <th scope="col" class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listloaisp as $loaisp)
                                    <tr>
                                        <td class="align-middle text-center">
                                            <a href="{{route('clientcategory', $loaisp->slug)}}"> {{$loaisp->idLoai}} </a>
                                        </td>
                                        <td class="align-middle"> {{$loaisp->tenLoai}} </td>
                                        <td class="align-middle text-center"> {{$loaisp->thuTu}} </td>
                                        <td class="align-middle text-center ">
                                            <a class="{{ $loaisp->anHien ? 'btn btn-success rounded-circle' : 'btn btn-secondary rounded-circle' }}">
                                                <i class="bi {{$loaisp->anHien?"bi-check-circle":"bi-x-circle"}}"></i>
                                            </a>
                                        </td>
                                        <td class="align-middle text-center">
                                            <form action="/admin/loaisp/{{$loaisp->idLoai}}" method="post">
                                                <a href="/admin/loaisp/{{$loaisp->idLoai}}/edit" class="btn btn-primary rounded-circle"><i class="bi bi-pencil-square"></i></a>            
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
                        {{-- <div> {{ $listloaisp->onEachSide(5)->links()}} </div>  --}}
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
            </div>
        </section>
    </main>
@endsection
