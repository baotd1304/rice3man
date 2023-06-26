@extends('templates.admin.binhluan')

@section('content')
<main id="main" class="main">
    <div class="container">
        <h1>Quản lý bình luận</h1>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Người dùng</th>
                    <th>Nội dung</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($binhLuans as $binhLuan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $binhLuan->nguoidung->ten }}</td>
                        <td>{{ $binhLuan->noiDung }}</td>
                        <td>
                            <a href="{{ route('binhluan.edit', $binhLuan->idBL) }}" class="btn btn-primary">Sửa</a>
                            <form action="{{ route('binhluan.destroy', $binhLuan->idBL) }}" method="POST"
                                style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection
