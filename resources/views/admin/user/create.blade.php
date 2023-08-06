
@extends('templates.admin.master')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Tài khoản</h1>
            <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Tài khoản</a></li>
                <li class="breadcrumb-item active">Danh sách tài khoản</li>
            </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
            <div class="col-lg-12">

                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tạo tài khoản</h5>

                    <!-- Table with stripped rows -->
                    <section class="content">
                        
                        <!-- Default box -->
                        <div class="container-fluid">
                            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="name">Tên</label>
                                                    <input value="{{ old('name') }}" type="text" name="name" id="name" class="form-control">	
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="email">Email</label>
                                                    <input value="{{ old('email') }}" type="text" name="email" id="email" class="form-control">	
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="phone">Số điện thoại</label>
                                                    <input value="{{ old('phone') }}" type="text" name="phone" id="phone" class="form-control">	
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="password">Mật khẩu</label>
                                                    <input value="{{ old('password') }}" type="password" name="password" id="password" class="form-control">	
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="password_confirmation">Xác nhận mật khẩu</label>
                                                    <input value="{{ old('password_confirmation') }}" type="password" name="password_confirmation" id="password_confirmation" class="form-control">	
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="address">Địa chỉ</label>
                                                    <input value="{{ old('address') }}" type="text" name="address" id="address" class="form-control">	
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <div class="col-md-12">
                                                    <label>Hình ảnh</label>
                                                    <input class="form-control" name="avatar" type="file" id="avatar" value="{{ old('avatar') }}">
                                               </div>
                                            </div>

                                            <div class="row mt-3 mb-3">
                                                <label class="col-form-label col-sm-2">Vai trò</label>
                                                <div class="col-md-4">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input mt-2" type="radio" name="role" id="gridRadios1" value="1" {{old('role')?"checked":""}}>
                                                        <label class="form-check-label" for="gridRadios1">Admin
                                                            <iconify-icon class="btn btn-danger rounded-circle" icon="clarity:administrator-solid" width="20" height="20"></iconify-icon>
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input mt-2" type="radio" name="role" id="gridRadios2" value="0" {{old('role')?"":"checked"}}>
                                                        <label class="form-check-label" for="gridRadios2">User
                                                            <iconify-icon class="btn btn-info rounded-circle" icon="clarity:user-solid" width="20" height="20"></iconify-icon>
                                                        </label>
                                                    </div>
                                                
                                                </div>
                                                <label class="col-form-label col-sm-2">Hoạt động</label>
                                                <div class="col-md-4">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input mt-2" type="radio" name="active" id="gridRadios3" value="1" {{old('active')?"checked":""}}>
                                                        <label class="form-check-label" for="gridRadios3">
                                                            <i class="bi bi-check-circle btn btn-success rounded-circle"></i>
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input mt-2" type="radio" name="active" id="gridRadios4" value="0" {{old('active')?"":"checked"}}>
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
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                    <a type="cancle" href="{{route('user.index')}}" class="btn btn-outline-dark ml-3">Hủy</a>
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

<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
@endsection
