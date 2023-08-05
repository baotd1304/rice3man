@extends('templates.admin.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Bình luận</h1>
            <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('binhluan.index') }}">Bình luận</a></li>
                <li class="breadcrumb-item active">Danh sách bình luận</li>
            </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">Danh sách bình luận</div>
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
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col">Người bình luận</th>
                                    <th scope="col" class="text-center">Nội dung</th>
                                    <th scope="col" class="text-center">Ngày đăng</th>
                                    <th scope="col" class="text-center">Hiển thị</th>
                                    <th scope="col" class="text-center" style="text-align: center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listbl as $bl)
                                    <tr>
                                        <td class="align-middle text-center"> {{$bl->idBL}} </td>
                                        <td class="align-middle">{{Str::limit($bl->tenSP, 30)}}</td>
                                        <td class="align-middle">{{$bl->tenND}}</td>
                                        <td class="align-middle"> {{Str::limit($bl->noiDung, 30)}} </td>
                                        <td class="align-middle text-center"> {{date('d/m/Y',strtotime($bl->ngayBL))}} </td>
                                        <td class="align-middle text-center">
                                            <a class="{{ $bl->anHien ? 'btn btn-success rounded-circle' : 'btn btn-secondary rounded-circle' }}">
                                                <i class="bi {{$bl->anHien?"bi-check-circle":"bi-x-circle"}}"></i>
                                            </a>
                                        </td>
                                        
                                        <td class="align-middle text-center">
                                            <form action="/admin/binhluan/{{$bl->idBL}}" method="post">
                                                <a href="/admin/binhluan/{{$bl->idBL}}/edit" class="btn btn-primary rounded-circle"><i class="bi bi-pencil-square"></i></a>            
                                                {{-- <button onclick="return confirm('Xác nhận xóa?')" class="btn btn-danger rounded-circle" type="submit"><i class="bi bi-trash"></i></button> --}}
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
                        {{-- <div> {{ $listbl->onEachSide(5)->links()}} </div>  --}}
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
            </div>
        </section>
    </main><!-- End #main -->

@endsection

