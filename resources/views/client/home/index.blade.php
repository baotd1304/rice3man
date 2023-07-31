@extends('client.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/client/home.css')}}">
@endsection
@section('main-content')

<section class="banner">
  <div class="swiper mySwiperBanner">
    <div class="swiper-wrapper">
      @foreach ($sliders as $slider)
      <div class="swiper-slide">
        <img src="{{ $slider->hinhSlider }}" alt="" width="1296px">
      </div>
      @endforeach
    </div>
    <div class="swiper-pagination"></div>
  </div>
</section>

{{-- Phần thương hiệu nổi bật --}}
<section class="app-section pt-3 pb-3">
  <div class="container">
    <div class="product-row__header position-relative d-flex">
      <h2 class="title"><a href="">Thương hiệu nổi bật</a></h2>
      <div class="position-relative navigate">
        <div class="swiper-button-next categoryGroup "></div>
        <div class="swiper-button-prev categoryGroup"></div>
      </div>
    </div>
    <div class="swiper mySwiperCategoryGroup">
      <div class="swiper-wrapper">
        @foreach ($thuonghieusps as $thuonghieusp)
        <div class="swiper-slide">
          <div class="category__group__card">
            <div class="thumb">
              <img  src="{{asset($thuonghieusp->urlHinhTH)}}" alt="" onerror="this.src='{{asset('upload/error.jpg')}}'" >
            </div>
            <div class="content">
              <a href="" class="name">{{$thuonghieusp->tenTH}}</a>
            </div>
          </div>

        </div>
        @endforeach
      </div>
      <div class="swiper-pagination categoryGroup "></div>
    </div>
  </div>
</section>
{{-- Kết thúc phần thương hiệu nổi bật --}}
{{-- --}}
<section class="app-section pt-3 pb-3">
  <div class="container">
    <div class="product-row__header position-relative d-flex">
      <h2 class="title"><a href="{{ route('clientcategory-group-all')}}">Sản phẩm mới nhất</a></h2>
      <div class="position-relative navigate">
        <div class="swiper-button-next categoryGroup "></div>
        <div class="swiper-button-prev categoryGroup"></div>
      </div>
    </div>
    <div class="products-row">
      
      <div class="swiper mySwiperTypeEvent">
        <div class="swiper-wrapper">
          @foreach ($productsFlashSale as $item)
          @php
            $price1="";
                  $price2=number_format($item->giaSP,0,",",".");
                  if($item->discount>0){
                    $price1=number_format($item->giaSP,0,",",".");
                    $price2=number_format($item->giaSP,0,",",".");
                  }
            // $progressValue=($item->quantity_output/$item->quantity_input)*100;
            // $progressTxt="Đã hết hàng";
            // if($progressValue<100&&$progressValue>90){
            //   $progressTxt="Sắp cháy hàng";
            // }
            // elseif ($progressValue<90) {
            //   $progressTxt="Đã bán: ".$item->quantity_output;
            // };

          @endphp
          <div class="swiper-slide">
            <x-ProductCard link="{{route('clientproduct-detail',['slug'=>$item->idSP])}}" 
              isProgress={{true}} progressTxt="Cháy hàng" progressValue="{{90}}"
              name="{{$item->tenSP}}" thumb="{{$item->urlHinh}}" priceOld="{{$price1}}"
              priceCurrent="{{$price2}}" discount="{{0}}" />
          </div>
          @endforeach
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </div>
</section>
{{-- Dịch vụ --}}
<section class="service-section mb-4 ">
  <div class="container">
    <div class="product-row__header position-relative d-flex">
      <div class="pt-3 pb-3 mb-0">
        <h2 class="title mb-0 "><a href="">Dịch vụ đặc biệt của chúng tôi </a></h2>
        <span>Những dịch vụ tốt nhất dành cho khách hàng của chúng tôi</span>
      </div>
    </div>
    <div class="products-row">
      <div class="swiper mySwiperService">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="service__card">
              <div class="item">
                <img width="235" height="158" class="lazyload loaded" src="{{ asset('upload/images/dichvu_1.png')}}" data-src="{{ asset('upload/images/dichvu_1.png')}}" alt="" data-was-processed="true">
                <h3>
                    Chất lượng, đa dạng
                </h3>
                <div class="content">
                    Sản phẩm chất lượng, đa dạng mẫu mã đến từ các thương hiệu uy tín, quen thuộc.
                </div>
                {{-- <a href="/collections/all" title="Tìm hiểu thêm">Tìm hiểu thêm</a> --}}
            </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="service__card">
              <div class="item">
                <img width="235" height="158" class="lazyload loaded" src="https://bizweb.dktcdn.net/100/485/131/themes/906771/assets/dichvu_2.jpg?1686556941849" data-src="//bizweb.dktcdn.net/100/485/131/themes/906771/assets/dichvu_1.jpg?1686556941849" alt="" data-was-processed="true">
                <h3>
                    Giao hàng nhanh chóng
                </h3>
                <div class="content">
                    Dịch vụ giao hàng nhanh chóng, đảm bảo an toàn, tiện lợi tới tận tay khách hàng.
                </div>
                {{-- <a href="/collections/all" title="Tìm hiểu thêm">Tìm hiểu thêm</a> --}}
            </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="service__card">
              <div class="item">
                <img width="235" height="158" class="lazyload loaded" src="https://bizweb.dktcdn.net/100/485/131/themes/906771/assets/dichvu_3.jpg?1686556941849" data-src="//bizweb.dktcdn.net/100/485/131/themes/906771/assets/dichvu_1.jpg?1686556941849" alt="" data-was-processed="true">
                <h3>
                    Thanh toán dễ dàng
                </h3>
                <div class="content">
                    Thanh toán dễ dàng với nhiều lựa chọn khác nhau, đảm bảo thông tin khách hàng.
                </div>
                {{-- <a href="/collections/all" title="Tìm hiểu thêm">Tìm hiểu thêm</a> --}}
            </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
{{-- kết thúc phần dịch vụ --}}

{{-- --}}
@php
$indexCategory=0;
@endphp
@foreach ($categories as $category )
@if (count($category->SanPhams)<4)
    
@else
    
@php
$indexCategory++;
@endphp

<section class="app-section">
  <div class="container">
    {{-- <h2 class="title pt-3 pb-3 mb-0"><a href="">{{$category->tenLoai}}</a></h2> --}}
    <div class="row align-items-center products-section">
      {{-- <div class="col-xl-3 col-lg-4 col-md-5 col-xs-12 mb-3 mb-md-0">
        <a href="">
          <img style="width:100%;height:100%" class="category-thumb"
            src="https://bizweb.dktcdn.net/100/485/131/themes/906771/assets/image_product1.png?1686556941849" onerror="this.src='{{asset('upload/error.jpg')}}'" alt="">
        </a>
      </div> --}}
      <div class="col-xl-12 col-lg-12 col-md-12 col-xs-12" style="height:100%">
        <div class="products-row mb-5">
          <div class="swiper mySwiperTypeCategory">
            <div class="product-row__header position-relative d-flex">
              <h2 class="title "><a href="{{ route('clientcategory',['slug'=>$category->idLoai])}}">{{$category->tenLoai}}</a></h2>
              <div class="position-relative navigate">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
              </div>
            </div>
            <div class="swiper-wrapper">
                @foreach ($category->SanPhams as $item)
                @php
                  $price1="";
                  $price2=number_format($item->giaSP,0,",",".");
                  if($item->discount>0){
                    $price1=number_format($item->giaSP,0,",",".")."đ";
                    $price2=number_format($item->giaSP,0,",",".");
                  }
                @endphp
                <div class="swiper-slide">
                  <x-ProductCard link="{{route('clientproduct-detail',['slug'=>$item->idSP])}}" 
                    name="{{$item->tenSP}}" thumb="{{$item->urlHinh}}" priceOld="{{$price1}}"
                    priceCurrent="{{$price2}}đ" discount="{{0}}" />
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
          </div>
          <div class="view_more text-center mt-3 position-relative">
            <a href="{{route('clientcategory',['slug'=>$item->idLoai])}}" title="Xem thêm" class="position-relative text-light d-inline-block">
              Xem thêm
            </a>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</section>
@endif
@endforeach
{{-- Hiển thị phản hồi từ khách hàng --}}
<section class="app-section pt-3 pb-3">
  <div class="container">
    <h2 class="title pt-3 pb-3 mb-0"><a href="">Phản hồi tù khách hàng</a></h2>
    <div class="swiper mySwiperFeeback " style="padding: 10px">
      <div class="swiper-wrapper ">
        @foreach ($binhluans as $bl)
        <div class="swiper-slide ">
          <div class="feedback-card">
            <div class="info">
              {{-- <img src="https://bizweb.dktcdn.net/thumb/small/100/434/011/themes/845632/assets/ykkh_1.jpg?1681360920404" class="thumb" alt=""> --}}
              <div class="auth">
                <div class="name">{{ $bl->ten }}</div>
                {{-- <div class="posittion">Nội trợ</div> --}}
              </div>
            </div>
            <div class="content style='width:588px; height:81px'">
              {{ $bl->noiDung }}
            </div>
          </div>
        </div>
        {{-- <div class="swiper-slide ">
          <div class="feedback-card">
            <div class="info">
              <img src="https://bizweb.dktcdn.net/thumb/small/100/434/011/themes/845632/assets/ykkh_2.jpg?1681360920404" class="thumb" alt="">
              <div class="auth">
                <div class="name">Đoàn Hương Giang</div>
                <div class="posittion">Nhân viên văn phòng</div>
              </div>
            </div>
            <div class="content">
             Mình là một nhân viên văn phòng nên thời gian để đi chợ là không có, thật may mắn mình đã tìm được green market.  Theo mình thì đây là website về thực phẩm tốt nhất hiện nay,
            </div>
          </div>
        </div> --}}
        @endforeach
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section>
{{-- hiển thị tin tức nổi bật --}}
<section class="app-section pt-3 pb-3">
  <div class="container">
    <div class="product-row__header position-relative d-flex">
      {{-- <div class="pt-3 pb-3 mb-0">
        <h2 class="title"><a href="">Tin tức mới nhất </a></h2>
         <span>Tin tức mới nhất được chúng tôi cập nhật thường xuyên</span>
      </div>
      <div class="position-relative navigate">
        <div class="swiper-button-next categoryGroup "></div>
        <div class="swiper-button-prev categoryGroup"></div>
      </div> --}}
    </div>
    <h2 class="title pt-3 pb-3 mb-0"><a href="">Bài viết nổi bật</a></h2>
    <div class="swiper mySwiperNews">
      <div class="swiper-wrapper">
        @foreach ($news as $item)
        <div class="swiper-slide">
          <x-NewsCard title="{{$item->tieuDe}}"
            thumb="{{$item->thumbNail}}"
            summary="{{$item->noiDung}} "
            {{-- day="{{$item->ngay}}"
            month="{{$item->ngay}}"  --}}
            />
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
@endsection
@section("js")

<script>
  var mySwiperTypeCategory = new Swiper(".mySwiperTypeCategory", {
     slidesPerView: 4,
     spaceBetween: 20,
     navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        breakpoints: {
        0: {
          slidesPerView: 2,
          spaceBetween: 20,
          grid:{
            rows:2
          }
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 20,
        },
      },
   });
   var mySwiperTypeEvent = new Swiper(".mySwiperTypeEvent", {
     slidesPerView: 5,
     spaceBetween: 20,
     navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        breakpoints: {
        0: {
          slidesPerView: 2,
          spaceBetween: 20,
          grid:{
            rows:2
          }
        },
        768: {
          slidesPerView: 4,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 5,
          spaceBetween: 20,
        },
      },
   });
   var mySwiperFeeback = new Swiper(".mySwiperFeeback", {
     slidesPerView: 2,
     spaceBetween: 20,
     navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
   });
   var mySwiperCategoryGroup = new Swiper(".mySwiperCategoryGroup", {
     slidesPerView: 6,
     spaceBetween: 20,
     navigation: {
          nextEl: ".swiper-button-next.categoryGroup",
          prevEl: ".swiper-button-prev.categoryGroup",
        },
      breakpoints: {
        0: {
          slidesPerView: 1,
          spaceBetween: 20,
          pagination: {
              el: ".swiper-pagination.categoryGroup",
              dynamicBullets: true,

            }
        },
        640: {
          slidesPerView: 4,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 6,
          spaceBetween: 20,
        },
      },
   });
   var mySwiperBanner = new Swiper(".mySwiperBanner", {
     slidesPerView: 1,
     spaceBetween: 0,
     autoplay: {
        delay:4000,
        disableOnInteraction: false,
      },
     loop:true,
     pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,

      },
     navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
   });
   var mySwiperNews = new Swiper(".mySwiperNews", {
     slidesPerView: 4,
     spaceBetween: 20,
     navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
     breakpoints: {
        0: {
          slidesPerView: 1.3,
          spaceBetween: 20,
          pagination: {
              el: ".swiper-pagination",
              dynamicBullets: true,

            },
        },
        640: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 20,
        },
      },
      
   });
   var mySwiperNews = new Swiper(".mySwiperService", {
     slidesPerView: 3,
     spaceBetween: 20,
     navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        breakpoints: {
        0: {
          slidesPerView: 1.3,
          spaceBetween: 20,
          pagination: {
              el: ".swiper-pagination",
              dynamicBullets: true,

            },
        },
        640: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
      },
   });
   
   
</script>

@endsection