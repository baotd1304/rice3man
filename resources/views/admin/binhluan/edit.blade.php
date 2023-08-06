@extends('templates.admin.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Bình luận</h1>
            <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('binhluan.index') }}">Bình luận</a></li>
                <li class="breadcrumb-item active">Cập nhật bình luận</li>
            </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
            <div class="col-lg-12">

                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Cập nhật bình luận</h5>

                    <!-- Table with stripped rows -->
                    <section class="content">
                        
                        <!-- Default box -->
                        <div class="container-fluid">
                            <form action="{{ route('binhluan.update', $binhluan->idBL) }}" method="POST" enctype="multipart/form-data">
                                
                                <div class="">
                                    <div class="card-body">								
                                        <div class="row">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="tenSP">Tên sản phẩm</label>
                                                        <input value="{{ $binhluan->tenSP }}" type="text" name="tenSP" disabled class="form-control" placeholder="">	
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="tenND">Người bình luận</label>
                                                        <input value="{{ $binhluan->name }}" type="text" name="tenND" disabled class="form-control" placeholder="">	
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label>Mô tả</label> 
                                                <textarea id="moTa" name="moTa" rows="4" class="form-control" disabled>{{$binhluan->noiDung}}</textarea> 
                                            
                                            </div>

                                            <div class="row mt-3 mb-3">
                                                <label class="col-form-label col-sm-2">Hiển thị</label>
                                                <div class="col-md-4">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input mt-2" type="radio" name="anHien" id="gridRadios1" value="1" {{$binhluan->anHien?"checked":""}}>
                                                        <label class="form-check-label" for="gridRadios1">
                                                            <i class="bi bi-check-circle btn btn-success rounded-circle"></i>
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input mt-2" type="radio" name="anHien" id="gridRadios2" value="0" {{$binhluan->anHien?"":"checked"}}>
                                                        <label class="form-check-label" for="gridRadios2">
                                                            <i class="bi bi-x-circle btn btn-secondary  rounded-circle"></i>
                                                        </label>
                                                    </div>
                                                
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
                                    <a type="cancle" href="{{route('binhluan.index')}}" class="btn btn-outline-dark ml-3">Hủy</a>
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
    CKEDITOR.replace('moTa', {
        height: '150px', width: '100%', language: 'vi',
    });
</script>
@endsection
