@extends('templates.admin.master')
@section('nguoidung')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Danh sách người dùng</h1>
            <a href="{{ route('nguoidung.create') }}" class="btn btn-primary mb-3">Thêm người dùng</a>
            <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Quản lý người dùng</li>
                <li class="breadcrumb-item active">Danh sách người dùng</li>
            </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
            <div class="col-lg-12">

                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Danh sách người dùng</h5>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên người dùng</th>
                                <th scope="col">Email</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col" class="text-end">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($nguoiDung as $nd)
                    <tr>
                        <td class="align-middle">{{ $nd->idND }}</td>
                        <td class="align-middle">{{ $nd->ten }}</td>
                        <td class="align-middle">{{ $nd->email }}</td>
                        <td class="align-middle">{{ $nd->sdt }}</td>
                        <td class="align-middle">{{ $nd->diaChi }}</td>
                        <td class="align-middle">
                            <a href="{{ route('nguoidung.edit', $nd->idND) }}" class="btn btn-primary">Chỉnh sửa</a>
                            <form action="{{ route('nguoidung.destroy', $nd->idND) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                            </form>
                        </td>
                    </tr>@endforeach
                        </tbody>
                    </table>
                  
                    <!-- End Table with stripped rows -->

                </div>
                </div>

            </div>
            </div>
        </section>
    </main><!-- End #main -->

@endsection
