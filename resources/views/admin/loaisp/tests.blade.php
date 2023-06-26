@extends('templates.admin.master')
@section('content')
    <h1>Danh sách Loại sản phẩm</h1>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <a href="{{ route('loaisp.create') }}" class="btn btn-primary mb-3">Thêm Loại sản phẩm</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Loại</th>
                <th>Thứ Tự</th>
                <th>Ẩn/Hiện</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loaiSPs as $loaiSP)
                <tr>
                    <td>{{ $loaiSP->idLoai }}</td>
                    <td>{{ $loaiSP->tenLoai }}</td>
                    <td>{{ $loaiSP->thuTu }}</td>
                    <td>{{ $loaiSP->anHien ? 'Hiện' : 'Ẩn' }}</td>
                    <td>
                        <a href="{{ route('loaisp.edit', $loaiSP->idLoai) }}" class="btn btn-primary">Sửa</a>
                        <form action="{{ route('loaisp.destroy', $loaiSP->idLoai) }}" method="POST" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xoá?')">Xoá</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
