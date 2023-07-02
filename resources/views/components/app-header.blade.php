<link rel="stylesheet" href="{{asset('css/client/component/header.css')}}">
<div class="app__header">
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
                        <i class='bx bx-user'></i>
                        {{-- <div class="link">
                            @if (auth()->user())
                            <div><a href="{{route('clientaccount')}}">{{Auth::guard('web')->user()->username}}</a></div>
                            @else
                            <div><a href="{{route('clientshow-register')}}">Đăng ký </a></div>
                            <div><a href="{{route('clientshow-login')}}">Đăng nhập</a></div>
                            @endif
                            
                        </div> --}}
                     </div>
                     <div class="action-item cart position-relative">
                        <a  href="{{route('clientcart')}}">
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
                    <li><a href="">
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
                    <li><a href="{{route('clientaddjobs')}}">
                        Tuyển dụng 
                    </a></li>
                    <li><a href="{{route('clientshow-contact')}}">
                        Liên hệ
                    </a></li>
                    
                </ul>
            </div>
        </div>
</div>