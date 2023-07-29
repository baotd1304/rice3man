@extends('templates.admin.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Slider</h1>
            <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('slider.index') }}">Slider</a></li>
                <li class="breadcrumb-item active">Danh sách slider</li>
            </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">Danh sách slider</div>
                        <div class="adding">
                            <a href="{{ route('slider.create') }}"><i class="bi bi-plus-circle-fill fs-2"></i></a>
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
                                    <th scope="col">Tên slider</th>
                                    <th scope="col" class="text-center">Hình ảnh</th>
                                    <th scope="col" class="text-center">Ngày đăng</th>
                                    <th scope="col" class="text-center">Nhóm</th>
                                    <th scope="col" class="text-center">Hiển thị</th>
                                    <th scope="col" class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listslider as $bv)
                                    <tr>
                                        <td class="align-middle text-center"> {{$bv->id}} </td>
                                        <td class="align-middle"> {{ Str::limit($bv->tenSlider, 50) }} </td>
                                        <td class="align-middle text-center"><img src="{{$bv->hinhSlider}}" alt="" width="50px"></td>
                                        <td class="align-middle text-center"> {{date('d/m/Y',strtotime($bv->ngayDang))}} </td>
                                        <td class="align-middle text-center"> {{$bv->nhom}} </td>
                                        <td class="align-middle text-center">
                                            <a class="{{ $bv->anHien ? 'btn btn-success rounded-circle' : 'btn btn-secondary rounded-circle' }}">
                                                <i class="bi {{$bv->anHien?"bi-check-circle":"bi-x-circle"}}"></i>
                                            </a>
                                        </td>
                                        <td class="align-middle text-center">
                                            <form action="/admin/slider/{{$bv->id}}" method="post">
                                                <a href="/admin/slider/{{$bv->id}}/edit" class="btn btn-primary rounded-circle"><i class="bi bi-pencil-square"></i></a>            
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

