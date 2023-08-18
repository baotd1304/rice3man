@extends('templates.admin.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Thông tin liên hệ</h1>
            <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('contact.index') }}">Liên hệ</a></li>
                <li class="breadcrumb-item active">Danh sách liên hệ</li>
            </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
            <div class="col-lg-12">
                
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">Danh sách thương hiệu sản phẩm</div>
                        <div class="adding">
                            <a href="{{ route('contact.create') }}"><i class="bi bi-plus-circle-fill fs-2"></i></a>
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
                            <thead align="center">
                                <tr >
                                    <th scope="col">ID</th>
                                    <th scope="col">Tên công ty</th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Hotline</th>
                                    <th scope="col">Hoạt động</th>
                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody valign="middle">
                                @foreach ($listcontact as $contact)
                                    <tr>
                                        <td> {{$contact->id}} </td>
                                        <td> {{$contact->name}} </td>
                                        <td><img src="{{$contact->logo}}" alt="Chưa có logo" width="80px" height="50px"></td>
                                        <td> {{$contact->email}} </td>
                                        <td> {{$contact->hotline}} </td>
                                        <td>
                                            <a class="{{ $contact->active ? 'btn btn-success rounded-circle' : 'btn btn-secondary rounded-circle' }}">
                                                <i class="bi {{$contact->active?"bi-check-circle":"bi-x-circle"}}"></i>
                                            </a>
                                        </td>
                                        <td class="align-middle text-center">
                                            <form action="/admin/contact/{{$contact->id}}" method="post">
                                                <a href="/admin/contact/{{$contact->id}}/edit" class="btn btn-primary rounded-circle"><i class="bi bi-pencil-square"></i></a>            
                                                <button onclick="return confirm('Xác nhận xóa?')" class="btn btn-danger rounded-circle" type="submit"><i class="bi bi-trash"></i></button>
                                                @csrf  @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                
                                @endforeach
                            </tbody>

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                
                        </table>
                        {{-- <div> {{ $listcontact->onEachSide(5)->links()}} </div>  --}}
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
            </div>
        </section>
    </main>
@endsection
