@extends('client.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/client/home.css')}}">
{{-- -----------------products------------ --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{asset('css/client/product.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />


@endsection
@section('main-content')
<section class="bread-crumb"
    style="background: linear-gradient(0deg, rgba(0,0,0,0.8), rgba(0,0,0,0.3)),  url(/upload/images/slider\2023-07-29_1690624556_2.png) no-repeat center; height:200px">

    <div class="container">
        <div class="title-bread-crumb">
            Tất cả sản phẩm
        </div>
        <nav aria-label="breadcrumb  ">
            <ol class=" breadcrumb p-3" @style("margin:0;padding-left:0px")>
                <li class="breadcrumb-item"><a href="{{route('client')}}">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
            </ol>
        </nav>
    </div>
</section>
<div class="container">
    <section>
        <div class="row">
            @foreach ($coupons as $item)
            <div class="col-12 col-lg-3 col-md-6">
                <x-AppCouponCard maGiamGia="{{$item->maGiamGia}}" chiTiet="{{$item->chiTiet}}"
                    ngayBatDau="{{$item->ngayBatDau}}" ngayKetThuc="{{$item->ngayKetThuc}}" />

            </div>
            @endforeach
        </div>
    </section>
    <div class="products">
        {{-- ----------------------------- --}}
        <div class="row">
            <div class="dqdt-sidebar col-12 col-lg-3 d-sm-block d-none">
                
                <div class="pro-1">
                    <div class="customsselects">
                        <div class="aside-content aside-content-menu">
                            <div class="title-head-col">
                                Danh mục sản phẩm
        
                            </div>
                            <nav class="nav-category">
                                <ul class="nav navbar-pills">
                                    @foreach ($categories as $item )
                                    <li class="nav-item  relative {{ isset($category->idLoai) && $category->idLoai == $item->idLoai ? 'active' : '' }}">
                                        <a title="Rau quả" href="{{route('clientcategory',["slug"=>$item->idLoai])}}" class="nav-link pr-5">{{$item->tenLoai}}</a>
                                    </li>
                                    @endforeach
        
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
                <div class="pro-1">
                    <form class="pro-text">
                        <aside class="aside-item filter-price mb-3 col-12 col-sm-12 col-lg-12">
                            <div class="h2 title-head m-0 pt-2 pb-2 font-weight-bold">Lọc giá</div>
                            <div class="aside-content filter-group mb-1">
                                <div class="row">
                                    <div class="col-6 col-lg-12 col-xl-6">
                                        <label class="d-flex align-items-baseline pt-1 pb-1 m-0"
                                            for="filter-khoanggia-tu">
                                            <input type="text" id="filter-khoanggia-tu" name="min_price"
                                                class="form-control" value="{{$request->get('min_price')}}"
                                                placeholder="Giá tối thiểu ">
                                        </label>
                                    </div>
                                    <div class="col-6 col-lg-12 col-xl-6">
                                        <label class="d-flex align-items-baseline pt-1 pb-1 m-0"
                                            for="filter-khoanggia-den">
                                            <input type="text" id="filter-khoanggia-den" name="max_price"
                                                class="form-control" value="{{$request->get('max_price')}}"
                                                placeholder=" Giá tối đa ">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary js-filter-pricerange font-weight-bold" href="javascript:;"
                                data-value="(>=1000 AND <=1100000)">Áp dụng</button>
                        </aside>
                    </form>
                </div><br>
                {{-- -----------------pro new--------------- --}}
                    

            </div>
            {{-- ------------------------------- --}}
            <div class="col-12 col-lg-9">

                <div class="pro-xep">
                    <div class="pro-x d-flex align-items-center gap-2" style="flex-wrap: wrap;">
                        <strong>Sắp xếp:</strong>

                        <form class="pro-text d-flex align-items-center gap-1">
                              <input type="radio" id="" name="sort_by" value="name_asc" {{ $request->get('sort_by') ==
                            'name_asc' ? 'checked' : '' }}>
                              <label for="">A-Z</label>
                              <input type="radio" id="" name="sort_by" value="name_desc" {{ $request->get('sort_by') ==
                            'name_desc' ? 'checked' : '' }}>
                              <label for="">Z-A</label>
                              <input type="radio" id="" name="sort_by" value="price_asc" {{ $request->get('sort_by') ==
                            'price_asc' ? 'checked' : '' }}>
                              <label for="">Giá tăng dần</label>
                              <input type="radio" id="" name="sort_by" value="price_desc" {{ $request->get('sort_by') ==
                            'price_desc' ? 'checked' : '' }}>
                              <label for="">Giá giảm dần</label>
                              <input type="radio" id="" name="sort_by" value="newest" {{ $request->get('sort_by') ==
                            'newest' ? 'checked' : '' }}>
                              <label for="">Mới nhất</label>
                              <input type="radio" id="" name="sort_by" value="oldest" {{ $request->get('sort_by') ==
                            'oldest' ? 'checked' : '' }}>
                              <label for="">Cũ nhất</label>
                            <button class="btn btn-primary">Lọc</button>
                        </form>
                    </div>
                </div>

                @if (count($products)>0)
                <div class="row">
                    @foreach ($products as $item)
                    @php
                    $price1="";
                    $price2=number_format($item->giaSP,0,",",".");
                    if($item->discount>0){
                    $price1=number_format($item->giaSP,0,",",".")."đ";
                    $price2=number_format($item->giaSP-($item->giaSP*$item->discount/100),0,",",".");
                    }
                    @endphp
                    <div class="col-6  col-lg-3 mb-2 mt-2">
                        <x-ProductCard link="{{route('clientproduct-detail',['slug'=>$item->idSP])}}"
                            name="{{$item->tenSP}}" thumb="{{$item->urlHinh}}" priceOld="{{$price1}}"
                            priceCurrent="{{$price2}}đ" discount="{{$item->discount}}" />

                    </div>
                    @endforeach
                </div>
                @else
                <div class="alert alert-warning d-flex justify-content-center">Danh mục trống</div>

                @endif

                <div class="d-flex justify-content-center mt-3">{{$products->appends(request()->all())->links()}}</div>

            </div>

        </div>


    </div>
</div>
@endsection
@section("js")

{{-- ---------------product---------- --}}

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="{{asset('./js/client/product.js')}}"></script>
<script src="{{asset('js/client/product.js')}}"></script>
<script>
    var mySwiperNews = new Swiper(".mySwiperService", {
     slidesPerView: 2,
     spaceBetween: 20,
     navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        breakpoints: {
        0: {
          slidesPerView: 1,
          spaceBetween: 20,
          pagination: {
              el: ".swiper-pagination",
              dynamicBullets: true,

            },
        },
        640: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
      },
   });
</script>
@endsection