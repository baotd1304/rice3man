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
                <div class="card-body">
                    <h5 class="card-title">Thêm mã giảm giá</h5>

                    <!-- Table with stripped rows -->
                    <section class="content">
                        
                        <!-- Default box -->
                        <div class="container-fluid">
                            <form action="{{ route('magiamgia.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="">
                                    <div class="card-body">								
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="maGiamGia">Mã giảm giá</label>
                                                    <input value="{{ old('maGiamGia') }}" type="text" name="maGiamGia" id="maGiamGia" class="form-control @error('maGiamGia') is-invalid @enderror" placeholder="mã giảm giá">
                                                    @error('maGiamGia')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="chiTiet">Chi tiết</label>
                                                    <input value="{{ old('chiTiet') }}" type="text" name="chiTiet" id="chiTiet" class="form-control @error('chiTiet') is-invalid @enderror" placeholder="mô tả chi tiết về mã giảm giá" min="1">
                                                    @error('chiTiet')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="giaTri">Giá trị</label>
                                                    <input value="{{ old('giaTri') }}" type="number" name="giaTri" id="giaTri" class="form-control @error('giaTri') is-invalid @enderror" placeholder="nhập số tiền giảm hoặc % giảm" min="0">
                                                    @error('giaTri')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror	
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="dieuKien">Điều kiện</label>
                                                    <input value="{{ old('dieuKien') }}" type="number" name="dieuKien" id="dieuKien" class="form-control @error('dieuKien') is-invalid @enderror" placeholder="≥ số tiền tối thiểu" min="0">
                                                    @error('dieuKien')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="luotSuDung">Lượt đã sử dụng</label>
                                                    <input value="{{ old('luotSuDung') }}" type="number" name="luotSuDung" id="luotSuDung" class="form-control @error('luotSuDung') is-invalid @enderror" placeholder="0" min="0">
                                                    @error('luotSuDung')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="gioiHan">Giới hạn lượt dùng</label>
                                                    <input value="{{ old('gioiHan') }}" type="number" name="gioiHan" id="gioiHan" class="form-control" placeholder="Giới hạn số lượt dùng của mã" min="0">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="ngayBatDau">Thời gian bắt đầu</label>
                                                    <input value="{{ old('ngayBatDau') }}" type="datetime-local" name="ngayBatDau" id="ngayBatDau" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="ngayKetThuc">Thời gian kết thúc</label>
                                                    <input value="{{ old('ngayKetThuc') }}" type="datetime-local" name="ngayKetThuc" id="ngayKetThuc" class="form-control @error('ngayKetThuc') is-invalid @enderror" placeholder="" min="">
                                                    @error('ngayKetThuc')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mt-3 mb-3" style="margin-left: 0px; margin-right: 0px">
                                                <div class="col-md-6" style="padding-left: 0px;padding-right: 0px">
                                                    <label class="col-form-label col-sm-3">Loại mã</label>
                                                    <div class="btn-group col-md-7" role="group" aria-label="Basic radio toggle button group">
                                                        <input value="0" type="radio" class="btn-check" name="loaiMa" id="btnradio5" autocomplete="off" {{old('loaiMa')?"":"checked"}}>
                                                        <label class="btn btn-outline-success" for="btnradio5">Giảm số tiền</label>
                                                        <input value="1" type="radio" class="btn-check" name="loaiMa" id="btnradio6" autocomplete="off" {{old('loaiMa')?"checked":""}}>
                                                        <label class="btn btn-outline-info" for="btnradio6">Giảm theo %</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 row ">
                                                    <label class="col-form-label col-sm-5">Hoạt động</label>
                                                    <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input mt-2" type="radio" name="hoatDong" id="gridRadios3" value="1" {{old('hoatDong')?"checked":""}}>
                                                            <label class="form-check-label" for="gridRadios3">
                                                                <i class="bi bi-check-circle btn btn-success rounded-circle"></i>
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input mt-2" type="radio" name="hoatDong" id="gridRadios4" value="0" {{old('hoatDong')?"":"checked"}}>
                                                            <label class="form-check-label" for="gridRadios4">
                                                                <i class="bi bi-x-circle btn btn-secondary rounded-circle"></i>
                                                            </label>
                                                        </div>
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>							
                                </div>

                                {{-- @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif --}}

                                <div class="pb-3 pt-3">
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                    <a type="cancle" href="{{ route('magiamgia.index')}}" class="btn btn-outline-dark ml-3">Hủy</a>
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
