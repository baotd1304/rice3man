@extends('templates.admin.loaisanpham')
@section('create')
<main id="main" class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Thêm Loại sản phẩm</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('loaisanpham.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="tenLoai" class="form-label">Tên Loại</label>
                        <input type="text" class="form-control" id="tenLoai" name="tenLoai" required>
                    </div>

                    <div class="mb-3">
                        <label for="thuTu" class="form-label">Thứ Tự</label>
                        <input type="number" class="form-control" id="thuTu" name="thuTu" required>
                    </div>

                    <div class="mb-3">
                        <label for="anHien" class="form-label">Ẩn/Hiện</label>
                        <select class="form-control" id="anHien" name="anHien" required>
                            <option value="1">Hiện</option>
                            <option value="0">Ẩn</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
    </div>
    <main
@endsection
