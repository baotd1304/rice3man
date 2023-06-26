@extends('templates.admin.nguoidung')

@section('edit1')
    <main id="main" class="main">
        <div class="pagetitle">
            
            <nav>
                <ol class="breadcrumb">
                    
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Chỉnh sửa thông tin người dùng</h5>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('nguoidung.update', $nguoiDung->idND) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="ten" class="form-label">Tên</label>
                                    <input type="text" class="form-control" id="ten" name="ten" value="{{ $nguoiDung->ten }}" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $nguoiDung->email }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="sdt" class="form-label">Số điện thoại</label>
                                    <input type="text" class="form-control" id="sdt" name="sdt" value="{{ $nguoiDung->sdt }}">
                                </div>
                                <div class="mb-3">
                                    <label for="diaChi" class="form-label">Địa chỉ</label>
                                    <input type="text" class="form-control" id="diaChi" name="diaChi" value="{{ $nguoiDung->diaChi }}">
                                </div>
                                <div class="mb-3">
                                    <label for="hinh" class="form-label">Hình</label>
                                    <input type="text" class="form-control" id="hinh" name="hinh" value="{{ $nguoiDung->hinh }}">
                                </div>
                                <div class="mb-3">
                                    <label for="vaiTro" class="form-label">Vai trò</label>
                                    <select class="form-select" id="vaiTro" name="vaiTro" required>
                                        <option value="1">Admin</option>
                                        <option value="0">User</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="hoatDong" class="form-label">Hoạt động</label>
                                    <select class="form-select" id="hoatDong" name="hoatDong" required>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
