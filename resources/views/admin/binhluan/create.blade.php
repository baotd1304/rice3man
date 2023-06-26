@extends('templates.admin.binhluan')

@section('create')
    <h1>Thêm bình luận cho sản phẩm: {{ $sanpham->ten }}</h1>

    <form action="{{ route('binhluan.store', $sanpham->id) }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="noiDung" class="form-label">Nội dung bình luận</label>
            <textarea class="form-control" id="noiDung" name="noiDung" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
@endsection
