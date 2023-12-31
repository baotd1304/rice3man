@extends('templates.admin.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Sản phẩm</h1>
            <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('sanpham.index') }}">Sản phẩm</a></li>
                <li class="breadcrumb-item active">Thêm sản phẩm</li>
            </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
            <div class="col-lg-12">

                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Thêm sản phẩm</h5>

                    <!-- Table with stripped rows -->
                    <section class="content">
                        
                        <!-- Default box -->
                        <div class="container-fluid">
                            <form action="{{ route('sanpham.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-3 row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="tenSP">Tên sản phẩm</label>
                                                        <input value="{{ old('tenSP') }}" type="text" name="tenSP" id="tenSP" class="form-control" placeholder="">	
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="slug">Slug</label>
                                                        <input value="{{ old('slug') }}" type="text" name="slug" id="slug" class="form-control" placeholder="">	
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="giaSP">Giá sản phẩm</label>
                                                        <div class="input-group">
                                                            <input value="{{ old('giaSP') }}" type="number" name="giaSP" id="giaSP" class="form-control" 
                                                                placeholder="" min="1" aria-describedby="basic-addon2">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text" id="basic-addon2">VNĐ</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-md-6">
                                                    <label>Loại sản phẩm</label> 
                                                    <select class="form-control" name="idLoai">
                                                        @foreach ($loaisp as $loai )
                                                            <option value="{{$loai->idLoai}}">{{$loai->idLoai}} - {{$loai->tenLoai}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Thương hiệu sản phẩm</label> 
                                                    <select class="form-control" name="idTH">
                                                        @foreach ($thuonghieusp as $thuonghieu )
                                                            <option value="{{$thuonghieu->idTH}}">{{$thuonghieu->idTH}} - {{$thuonghieu->tenTH}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-md-12">
                                                    <label>Hình ảnh</label>
                                                    <input class="form-control" name="urlHinh" type="file" id="urlHinh" value="{{ old('urlHinh') }}">
                                               </div>
                                            </div>
                                            <div class="row mt-3 mb-3">
                                                <label class="col-form-label col-sm-2">Hiển thị</label>
                                                <div class="col-md-4">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input mt-2" type="radio" name="anHien" id="gridRadios1" value="1" {{old('anHien')?"checked":""}}>
                                                        <label class="form-check-label" for="gridRadios1">
                                                            <i class="bi bi-check-circle btn btn-success rounded-circle"></i>
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input mt-2" type="radio" name="anHien" id="gridRadios2" value="0" {{old('anHien')?"":"checked"}}>
                                                        <label class="form-check-label" for="gridRadios2">
                                                            <i class="bi bi-x-circle btn btn-secondary rounded-circle"></i>
                                                        </label>
                                                    </div>
                                                
                                                </div>
                                                <label class="col-form-label col-sm-2">Nổi bật</label>
                                                <div class="col-md-4">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input mt-2" type="radio" name="noiBat" id="gridRadios3" value="1" {{old('noiBat')?"checked":""}}>
                                                        <label class="form-check-label" for="gridRadios3">
                                                            <i class="bi bi-check-circle btn btn-success rounded-circle"></i>
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input mt-2" type="radio" name="noiBat" id="gridRadios4" value="0" {{old('noiBat')?"":"checked"}}>
                                                        <label class="form-check-label" for="gridRadios4">
                                                            <i class="bi bi-x-circle btn btn-secondary rounded-circle"></i>
                                                        </label>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label>Mô tả</label> 
                                                <textarea id="moTa" name="moTa" rows="5" class="form-control"></textarea> 
                                            
                                            </div>
                                        </div>							
                                </div>

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="pb-3 pt-3">
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                    <a type="cancle" href="{{route('sanpham.index')}}" class="btn btn-outline-dark ml-3">Hủy</a>
                                </div>
                            </form>

                        </div>
                        <!-- /.card -->
                    </section>
                    <!-- End Table with stripped rows -->

                </div>
                </div>

            </div>
            </div>
        </section>
    </main><!-- End #main -->



@endsection

@section('customJs')

<script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('moTa', {
        height: '200px', width: '100%', language: 'vi'
    });
</script>

<script>
    $('#tenSP').change(function(e) {
        $.get('{{ route('sanpham.slug') }}',
            { 'tenSP': $(this).val() },
            function( data ){
                $('#slug').val(data.slug);
            }
        );
    });
</script>

@endsection
