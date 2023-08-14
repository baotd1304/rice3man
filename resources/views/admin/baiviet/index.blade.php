@extends('templates.admin.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Bài viết</h1>
            <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('baiviet.index') }}">Bài viết</a></li>
                <li class="breadcrumb-item active">Danh sách bài viết</li>
            </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">Danh sách bài viết</div>
                        <div class="adding">
                            <a href="{{ route('baiviet.create') }}"><i class="bi bi-plus-circle-fill fs-2"></i></a>
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
                                    <th scope="col">Tiêu đề bài viết</th>
                                    <th scope="col" class="text-center">Hình ảnh</th>
                                    {{-- <th scope="col" class="text-center">Nội dung</th> --}}
                                    <th scope="col" class="text-center">Tác giả</th>
                                    <th scope="col" class="text-center">Ngày đăng</th>
                                    <th scope="col" class="text-center">Hiển thị</th>
                                    <th scope="col" class="text-center">Nổi bật</th>
                                    <th scope="col" class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listbv as $bv)
                                    <tr>
                                        <td class="align-middle text-center">
                                            <a href="{{route('clientnews-detail', $bv->slug)}}"> {{$bv->idBV}} </a>
                                        </td>
                                        <td class="align-middle"> {{ Str::limit($bv->tieuDe, 50) }} </td>
                                        <td class="align-middle text-center"><img src="{{$bv->thumbNail}}" alt="" width="50px"></td>
                                        <td class="align-middle text-center"> {{$bv->tacGia}} </td>
                                        <td class="align-middle text-center"> {{date('d/m/Y',strtotime($bv->ngayDang))}} </td>
                                        <td class="align-middle text-center">
                                            <a class="{{ $bv->anHien ? 'btn btn-success rounded-circle' : 'btn btn-secondary rounded-circle' }}">
                                                <i class="bi {{$bv->anHien?"bi-check-circle":"bi-x-circle"}}"></i>
                                            </a>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a class="{{ $bv->noiBat ? 'btn btn-success rounded-circle' : 'btn btn-secondary rounded-circle' }}">
                                                <i class="bi {{$bv->noiBat?"bi-check-circle":"bi-x-circle"}}"></i>
                                            </a>
                                        </td>
                                        <td class="align-middle text-center">
                                            <form action="/admin/baiviet/{{$bv->idBV}}" method="post">
                                                <a href="/admin/baiviet/{{$bv->idBV}}/edit" class="btn btn-primary rounded-circle"><i class="bi bi-pencil-square"></i></a>            
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
                        {{-- <div> {{ $listbv->onEachSide(5)->links()}} </div>  --}}
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
            </div>
        </section>
    </main><!-- End #main -->

@endsection

