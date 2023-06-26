@extends('templates.admin.binhluan')

@section('edit')
    <h1>Chỉnh sửa bình luận</h1>

    <form action="{{ route('binhluan.update', $sanPham->idSP, $binhLuan->idBL) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="noiDung" class="form-label">Nội dung bình luận</label>
            <textarea class="form-control" id="noiDung" name="noiDung" required>{{ $binhluan->noiDung }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
@endsection
