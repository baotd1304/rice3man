@extends('templates.admin.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Tài khoản</h1>
            <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Tài khoản</a></li>
                <li class="breadcrumb-item active">Danh sách tài khoản</li>
            </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">Danh sách tài khoản</div>
                        <div class="adding">
                            <a href="{{ route('user.create') }}"><i class="bi bi-plus-circle-fill fs-2"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                {{ $message }}
                            </div>
                        @endif
                        <!-- Table with stripped rows -->
                        <table class="table datatable table-hover table-strip table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">ID</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Email</th>
                                    <th scope="col" class="text-center">Số điện thoại</th>
                                    <th scope="col" class="text-center">Hình ảnh</th>
                                    <th scope="col" class="text-center">Vai trò</th>
                                    <th scope="col" class="text-center">Hoạt động</th>
                                    <th scope="col" class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($user as $u)
                        <tr>
                            <td class="align-middle text-center">{{ $u->id }}</td>
                            <td class="align-middle">{{ $u->name }}</td>
                            <td class="align-middle">{{ $u->email }}</td>
                            <td class="align-middle text-center">{{ $u->phone }}</td>
                            <td class="align-middle text-center">
                                @if ($u->avatar == '')
                                    <img src="{{asset('upload/images/bx_user_circle.png')}}" alt="" width="50px" height="50px">
                                @else <img src="{{$u->avatar}}" alt="" width="50px" height="50px">
                                @endif
                            </td>
                            <td class="align-middle text-center">
                                <a class="">
                                    <iconify-icon class="btn btn-{{$u->role?"danger":"info"}} rounded-circle" icon="clarity:{{$u->role?"administrator-solid":"user-solid"}}" width="20" height="30"></iconify-icon>
                                </a>
                            </td>
                            <td class="align-middle text-center">
                                <a class="{{ $u->active ? 'btn btn-success rounded-circle' : 'btn btn-secondary rounded-circle' }}">
                                    <i class="bi {{$u->active?"bi-check-circle":"bi-x-circle"}}"></i>
                                </a>
                            </td>
                            <td class="align-middle text-center">
                                <form action="/admin/user/{{$u->id}}" method="post">
                                    <a href="/admin/user/{{$u->id}}/edit" class="btn btn-primary rounded-circle"><i class="bi bi-pencil-square"></i></a>            
                                    <button onclick="return confirm('Xác nhận xóa?')" class="btn btn-danger rounded-circle" type="submit"><i class="bi bi-trash"></i></button>
                                    @csrf  @method('DELETE')
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
@section('customJs')

<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
@endsection