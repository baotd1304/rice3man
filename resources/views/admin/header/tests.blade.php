@extends('templates.admin.master')
@section('content')
<h1>Danh sách Loại sản phẩm</h1>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    {{ $message }}
</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên Loại</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($spName as $loaiSP)
        <tr>
            <td>{{ $loaiSP->sdt}}</td>
            <td>{{ $loaiSP->ten}}</td>

        </tr>
        @endforeach
    </tbody>
</table>
@endsection
