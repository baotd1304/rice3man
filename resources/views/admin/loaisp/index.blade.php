@extends('templates.admin.loaisanpham')

@section('content')
<main id="main" class="main">  
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif
                <div class="pagetitle">
                    <h1 class="text-center">Danh sách Loại sản phẩm</h1>
                    <a href="{{ route('loaisanpham.create') }}" class="btn btn-primary mb-3">Thêm Loại sản phẩm</a>
                </div>
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên Loại</th>
                            <th scope="col">Thứ Tự</th>
                            <th scope="col">Ẩn/Hiện</th>
                            <th scope="col">Thao Tác</th>    
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($loaiSPs as $loaiSP)
                            <tr>
                                <td class="align-middle">{{ $loaiSP->idLoai }}</td>
                                <td class="align-middle">{{ $loaiSP->tenLoai }}</td>
                                <td class="align-middle">{{ $loaiSP->thuTu }}</td>
                                <td class="align-middle">{{ $loaiSP->anHien ? 'Hiện' : 'Ẩn' }}</td>
                                <td class="align-middle">
                                    <a href="{{ route('loaisanpham.edit', $loaiSP->idLoai) }}" class="btn btn-primary">Sửa</a>
                                    <form action="{{ route('loaisanpham.destroy', $loaiSP->idLoai) }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xoá?')">Xoá</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
