<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assetsAdmin/img/faviconrice3man.jpg')}}" rel="icon">
  <link href="{{ asset('assetsAdmin/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assetsAdmin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assetsAdmin/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('assetsAdmin/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assetsAdmin/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{ asset('assetsAdmin/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{ asset('assetsAdmin/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset('assetsAdmin/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assetsAdmin/css/style.css')}}" rel="stylesheet">

  {{-- css js file breeze --}}
  {{-- @vite(['resources/css/app.css', 'resources/js/app.js'])  --}}

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ route("clienthome")}}" class="logo d-flex align-items-center">
        <img src="{{ asset('assetsAdmin/img/logoRice3man.jpg')}}" alt="">
        <span class="d-none d-lg-block">Rice 3 Man</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    {{-- <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Tìm kiếm" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar --> --}}

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            @if (Auth::user()->avatar == '')
                <img src="{{asset('upload/images/bx_user_circle.png')}}" alt="" style="width: 50px; height: 50px">
            @else <img src="{{Auth::user()->avatar}}" alt="" width="50px" height="50px">
            @endif
            {{-- <img src="{{ asset('assetsAdmin/img/r3m.png')}}" alt="Profile" class="rounded-circle"> --}}
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ Auth::user()->name }}</h6>
              <span>{{ Auth::user()->role? 'Quản trị viên' : 'Khách hàng' }}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('admin.profile.edit')}}">
                <i class="bi bi-person"></i>
                <span>Thông tin tài khoản</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('client')}}">
                <i class="bi bi-arrow-return-left"></i>
                <span>Chuyển đến public</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="dropdown-item d-flex align-items-center" href="{{route('logout')}}"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Đăng xuất</span>
                </a>
              </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/dashboard">
          <i class="bi bi-grid"></i><span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route("loaisp.index") }}">
          <i class="bi bi-layout-text-window-reverse"></i><span>Loại sản phẩm</span>
        </a>
        
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route("sanpham.index") }}">
          <i class="bi bi-menu-button-wide"></i><span>Sản phẩm</span>
        </a>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route("thuonghieusp.index") }}">
          <i class="bi bi-journal-text"></i><span>Thương hiệu sản phẩm</span>
        </a>
      </li><!-- End Forms Nav -->

      <!-- End Charts Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed"  href="{{ route('chitiethoadon.index') }}">
          <i class="bi bi-grid"></i><span>Quản lý hoá đơn</span>
        </a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user.index') }}">
          <i class="bi bi-grid"></i><span>Quản lý tài khoản</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route("baiviet.index") }}">
          <i class="bi bi-journal-text"></i><span>Bài viết</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route("binhluan.index") }}">
          <i class="bi bi-journal-text"></i><span>Bình luận</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route("slider.index") }}">
          <i class="bi bi-journal-text"></i><span>Slider</span>
        </a>
      </li>

      <li class="nav-heading">Thông tin</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.profile.edit')}}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav --> --}}

      

    </ul>

  </aside><!-- End Sidebar-->