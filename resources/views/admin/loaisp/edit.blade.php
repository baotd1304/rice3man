@extends('templates.admin.loaisanpham')
@section('edit')
<main id="main" class="main">
    <h1>Sửa Loại sản phẩm</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('loaisanpham.update', $loaiSP->idLoai) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="tenLoai" class="form-label">Tên Loại</label>
            <input type="text" class="form-control" id="tenLoai" name="tenLoai" value="{{ $loaiSP->tenLoai }}" required>
        </div>

        <div class="mb-3">
            <label for="thuTu" class="form-label">Thứ Tự</label>
            <input type="number" class="form-control" id="thuTu" name="thuTu" value="{{ $loaiSP->thuTu }}" required>
        </div>

        <div class="mb-3">
            <label for="anHien" class="form-label">Ẩn/Hiện</label>
            <select class="form-control" id="anHien" name="anHien" required>
                <option value="1" {{ $loaiSP->anHien ? 'selected' : '' }}>Hiện</option>
                <option value="0" {{ !$loaiSP->anHien ? 'selected' : '' }}>Ẩn</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</main>
@endsection
