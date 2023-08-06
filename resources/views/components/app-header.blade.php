<link rel="stylesheet" href="{{asset('css/client/component/header.css')}}">
<div class="app__header">
    <a href="#"></a>
        <div class="app__header__control">
           <div class="container">
            <div class="action-item tongge-menu">
                <i class='bx bx-menu'></i>
            </div>
            <div class="app__logo">
                <img src="{{asset('assets/img/logoRice3man.jpg')}}" alt="">
            </div>
            <div class="action-item cart-mobile position-relative">
                <a  href="{{route('clientcart')}}">
                    <i class='bx bx-basket d-flex'></i>
                </a>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill ">
                    {{count($cartFarmApp)}}
                  </span>
             </div>
            <div class="action search-area">
                 <form action="{{route('clientsearch')}}"  class="action-item search">
                    <input type="text" name="q" placeholder="Từ khóa ...">
                    <button type="submit"><i class='bx bx-search'></i></button>
                 </form>
                 <div class="d-flex gap-3">

                     <div class="action-item hotline">
                        <i class='bx bx-phone-call bx-tada' ></i>
                        <div class="link">
                             <a href="tel:19008080">
                                19008080
                             </a>
                        </div>
                     </div>
                     <div class="action-item auth">
                         <div class="link">
                             @if (auth()->user())
                             <div class="nav-item dropdown">
                                 <a class="nav-link nav-profile d-flex align-items-center" href="#" 
                                 data-bs-toggle="dropdown" aria-expanded="false" 
                                 style="padding-left: 0px;padding-right: 0px;padding-top: 0px;padding-bottom: 0px;">
                                 <i class='bx bx-user'></i>
                                 <span class="text-white d-none d-md-block dropdown-toggle ps-1">{{Auth::user()->name}}</span>
                                </a><!-- End Profile Iamge Icon -->
                      
                                <ul class="dropdown-menu dropdown-menu-start dropdown-menu-arrow profile">
                                  <li>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.edit') }}">
                                      <span>Tài khoản</span>
                                    </a>
                                  </li>
                                  <li>
                                    <hr class="dropdown-divider">
                                  </li>
                      
                                  <li>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                      <span>Lịch sử mua hàng</span>
                                    </a>
                                  </li>
                                  @if (Auth()->user()->role == 1)
                                  <li>
                                    <hr class="dropdown-divider">
                                  </li>
                                  <li>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.dashboard')}}">
                                      <span>Chuyển đến Admin</span>
                                    </a>
                                  </li>
                                  @endif
                                  <li>
                                    <hr class="dropdown-divider">
                                  </li>
                      
                                  <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" 
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        <span>Đăng xuất</span>
                                        </a>
                                    </form>
                                  </li>
                                  
                                  
                      
                                </ul><!-- End Profile Dropdown Items -->
                            </div>
                            
                            @else
                            <div class="nav-item dropdown">
                                <a class="nav-link nav-profile d-flex align-items-center" href="#" 
                                    data-bs-toggle="dropdown" aria-expanded="false" 
                                    style="padding: 0px">
                                    <i class='bx bx-user'></i>
                                  <span class="text-white d-none d-md-block dropdown-toggle"></span>
                                </a><!-- End Profile Iamge Icon -->
                      
                                <ul class="dropdown-menu dropdown-menu-start dropdown-menu-arrow profile">
                                  <li>
                                    <a class="dropdown-item d-flex align-items-center" href="{{route('register')}}">
                                      <span>Đăng ký</span>
                                    </a>
                                  </li>
                                  <li>
                                    <hr class="dropdown-divider">
                                  </li>
                      
                                  <li>
                                    <a class="dropdown-item d-flex align-items-center" href="{{route('login')}}">
                                      <span>Đăng nhập</span>
                                    </a>
                                  </li>
                                </ul><!-- End Profile Dropdown Items -->
                            </div>
                            @endif
                            
                        </div>
                     </div>
                     <div class="action-item cart position-relative">
                        <a  href="{{route('clientshow-contact')}}">
                            <i class='bx bx-map d-flex'></i>
                        </a>
                     </div>
                     <div class="action-item cart position-relative">
                        <a  href="{{route('clientcart')}}">
                            <i class='bx bx-basket d-flex'></i>
                        </a>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill ">
                            {{count($cartFarmApp)}}
                          </span>
                     </div>
                 </div>
            </div>
           
           </div>
        </div>
        <div class="container">
        <div class="app__header__navigation">
                <ul class="menu">
                    <li><a href="{{route('clienthome')}}">
                        Trang chủ
                    </a></li>
                    <li><a href="{{route('clientaddjobs')}}">
                      Về chúng tôi
                  </a></li>
                    <li>
                        <a href="{{route('clientcategory-group-all')}}">
                           Sản phẩm 
                           <i class='bx bxs-down-arrow'></i>
                        </a>
                        <div class="categoryGroupList">
                          
                                <div class="categoryList">
                                    @foreach ($categories as $category )
                                        <div>
                                           <a href="{{route('clientcategory',["slug"=>$category->idLoai])}}">
                                            {{$category->tenLoai}}
                                           </a>
                                        </div>
                                    @endforeach
                                </div>
                        </div>
                    </li>
                    <li><a href="{{route('clientnews')}}">
                        Tin tức 
                    </a></li>
                    
                    <li><a href="{{route('clientshow-contact')}}">
                        Liên hệ
                    </a></li>
                    
                </ul>
            </div>
        </div>
</div>