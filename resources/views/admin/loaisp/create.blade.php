@extends('templates.admin.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Loại sản phẩm</h1>
            <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('loaisp.index') }}">Loại sản phẩm</a></li>
                <li class="breadcrumb-item active">Thêm loại sản phẩm</li>
            </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
            <div class="col-lg-12">

                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Thêm loại sản phẩm</h5>

                    <!-- Table with stripped rows -->
                    <section class="content">
                        
                        <!-- Default box -->
                        <div class="container-fluid">
                            <form action="{{ route('loaisp.store') }}" method="POST">
                                @csrf
                                <div class="">
                                    <div class="card-body">								
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="tenLoai">Tên loại sản phẩm</label>
                                                    <input value="{{ old('tenLoai') }}" type="text" name="tenLoai" id="tenLoai" class="form-control" placeholder="">	
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="thuTu">Thứ tự</label>
                                                    <input value="{{ old('thuTu') }}" type="number" name="thuTu" id="thuTu" class="form-control" placeholder="" min="1">	
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="slug">Slug</label>
                                                    <input value="{{ old('slug') }}" type="text" name="slug" id="slug" class="form-control" placeholder="">	
                                                </div>
                                            </div>
                                            <fieldset class="row mt-3">
                                                <legend class="col-form-label col-sm-2 pt-0">Hiển thị</legend>
                                                <div class="col-sm-10">
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
                                            </fieldset>
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
                                    <a type="cancle" href="{{ route('loaisp.index')}}" class="btn btn-outline-dark ml-3">Hủy</a>
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
<script>
    $('#tenLoai').change(function(e) {
        $.get('{{ route('loaisp.slug') }}',
            { 'tenLoai': $(this).val() },
            function( data ){
                $('#slug').val(data.slug);
            }
        );
    });
</script>
@endsection


