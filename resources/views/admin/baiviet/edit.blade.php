@extends('templates.admin.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Bài viết</h1>
            <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('baiviet.index') }}">Bài viết</a></li>
                <li class="breadcrumb-item active">Cập nhật bài viết</li>
            </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
            <div class="col-lg-12">

                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Cập nhật bài viết</h5>

                    <!-- Table with stripped rows -->
                    <section class="content">
                        
                        <!-- Default box -->
                        <div class="container-fluid">
                            <form action="{{ route('baiviet.update', $baiviet->idBV) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="tenSP">Tiêu đề bài viết</label>
                                                    <input value="{{ $baiviet->tieuDe }}" type="text" name="tieuDe" id="tieuDe" class="form-control">	
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="slug">Slug</label>
                                                    <input value="{{ $baiviet->slug }}" type="text" name="slug" id="slug" class="form-control">	
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="col-md-12">
                                                    <label>Hình ảnh</label>
                                                    <img class="p-3" src="{{$baiviet->thumbNail}}" alt="BV chưa có hình" width="150px">
                                                    <input class="form-control" name="thumbNail" type="file" id="thumbNail" value="{{ $baiviet->thumbNail }}">
                                               </div>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label>Nội dung</label> 
                                                <textarea id="noiDung" name="noiDung" rows="5" class="form-control"> {{ $baiviet->noiDung }} </textarea> 
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="tacGia">Tác giả</label>
                                                    <div class="input-group">
                                                        <input value="{{ $baiviet->tacGia }}" type="text" name="tacGia" id="tacGia" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-3 mb-3">
                                                <label class="col-form-label col-sm-2">Hiển thị</label>
                                                <div class="col-md-4">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input mt-2" type="radio" name="anHien" id="gridRadios1" value="1" {{$baiviet->anHien?"checked":""}}>
                                                        <label class="form-check-label" for="gridRadios1">
                                                            <i class="bi bi-check-circle btn btn-success rounded-circle"></i>
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input mt-2" type="radio" name="anHien" id="gridRadios2" value="0" {{$baiviet->anHien?"":"checked"}}>
                                                        <label class="form-check-label" for="gridRadios2">
                                                            <i class="bi bi-x-circle btn btn-secondary rounded-circle"></i>
                                                        </label>
                                                    </div>
                                                
                                                </div>
                                                <label class="col-form-label col-sm-2">Nổi bật</label>
                                                <div class="col-md-4">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input mt-2" type="radio" name="noiBat" id="gridRadios3" value="1" {{$baiviet->noiBat?"checked":""}}>
                                                        <label class="form-check-label" for="gridRadios3">
                                                            <i class="bi bi-check-circle btn btn-success rounded-circle"></i>
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input mt-2" type="radio" name="noiBat" id="gridRadios4" value="0" {{$baiviet->noiBat?"":"checked"}}>
                                                        <label class="form-check-label" for="gridRadios4">
                                                            <i class="bi bi-x-circle btn btn-secondary rounded-circle"></i>
                                                        </label>
                                                    </div>
                                                
                                                </div>
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
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    <a type="cancle" href="{{route('baiviet.index')}}" class="btn btn-outline-dark ml-3">Hủy</a>
                                </div>

                                @csrf {{ method_field('PUT') }}

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
    CKEDITOR.replace('noiDung', {
        height: '200px', width: '100%', language: 'vi'
    });
</script>

<script>
    $('#tieuDe').change(function(e) {
        $.get('{{ route('baiviet.slug') }}',
            { 'tieuDe': $(this).val() },
            function( data ){
                $('#slug').val(data.slug);
            }
        );
    });
</script>
@endsection
