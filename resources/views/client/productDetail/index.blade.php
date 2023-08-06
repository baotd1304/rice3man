@extends('client.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/client/productDetail.css')}}">
<link rel="stylesheet" href="{{asset('css/client/newsDetail.css')}}">
@endsection
@section('main-content')
@if(session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif
{{-- backgound --}}
<section class="bread-crumb" style="background: linear-gradient(0deg, rgba(0,0,0,0.8), rgba(0,0,0,0.3)),  url(//bizweb.dktcdn.net/100/485/131/themes/906771/assets/breadcrumb.jpg?1686556941849) no-repeat center;">
	
	<div class="container">
		<div class="title-bread-crumb">
			{{$product->tenSP}}
		</div>
    <nav aria-label="breadcrumb  " >
      <ol class=" breadcrumb p-3" @style("margin:0;padding-left:0px")>
          <li class="breadcrumb-item"><a href="{{route('client')}}">Trang chủ</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{$product->tenSP}}</li>
      </ol>
    </nav>
	</div>
</section>
{{--  --}}
<section class="container mt-4">
 
</section>
<section class="product-detail grid container mt-4">
  <div class="">
    <div class="product-detail--infos">
      <div class="product-detail--img product-image-block relative">
        <div class="swiper mySwiperProductDetailThumb">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="{{asset($product->urlHinh)}}" alt=""
                onerror="this.src='{{asset('upload/error.jpg')}}'" />
            </div>
            {{-- @foreach ($product->products_images as $product_images )
            <div class="swiper-slide">
              <img src="{{asset('upload/'.$product_images->url)}}" alt=""
                onerror="this.src='{{asset('upload/error.jpg')}}'" />
            </div>
            @endforeach --}}
          </div>
        </div>
        {{-- <div thumbsSlider="" class="swiper mySwiperProductDetailGallery">
          <div class="swiper-wrapper">
            @foreach ($product->products_images as $product_images )
            <div class="swiper-slide">
              <img src="{{asset('upload/'.$product_images->url)}}" alt=""
                onerror="this.src='{{asset('upload/error.jpg')}}'" />
            </div>
            @endforeach
          </div>
        </div> --}}
        {{-- <img
          src="https://images.unsplash.com/photo-1587132137056-bfbf0166836e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=580&q=80"
          alt="" class=""> --}}
        {{-- <img
          src="https://images.unsplash.com/photo-1587132137056-bfbf0166836e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=580&q=80"
          alt="" class="product-detail--img swiper-slide"> --}}
      </div>
      <div class="product-detail--info">
        <h3 class="product-name font-weight-bold  mb-1">{{$product->tenSP}}</h3>
        <div class="product-detail--info__status">Tình trạng:
          {{-- <span>{{$product->quantity_output>=$product->quantity_input?"Cháy hàng":"Còn hàng"}}</span> | Thương hiệu: --}}
          <span>Còn hàng</span>
        </div>
        <div class="product-detail--info__status">Mã sản phẩm:
          <span>Đang cập nhật</span>
        </div>
        <div class="product-detail--info__prices">
          {{-- @if ($product->discount>0)
          <div class="product-detail--info__price-new">
            {{number_format(($product->giaSP-($product->giaSP*$product->discount/100)))}}<span>
              vnđ</span></div>
          <div class="product-detail--info__price-old">{{number_format($product->giaSP)}}<span> vnđ</span></div>
          @else
          <div class="product-detail--info__price-old">{{$product->giaSP}}<span> vnđ</span></div>
          @endif --}}
          <div class="product-detail--info__price-new">{{number_format($product->giaSP,0,",",".")}}<span> vnđ</span></div>
          <div class="product-detail--info__price-old">{{number_format($product->giaSP,0,",",".")}}<span> vnđ</span></div>
        </div>
        <label class="sl section" @style("display: block;font-weight: 600;margin-bottom: 0.5rem;")>Số lượng:</label>
        <form id="form-add" method="post" action={{route('clientadd-to-cart')}}>
          @csrf
          <input type="text" hidden name="productId" value={{$product->idSP}}>
          <div class="form-group">
            <div class="form-amount">
              <div class="btn btn-amount desc"><i class='bx bx-minus'></i></div>
              <input class="input-amount" type="number" name="amount" value=1>
              <div class="btn btn-amount add"><i class='bx bx-plus'></i></div>
            </div>
          </div>
          <div class="product-detail--info__cta">
            {{-- @if ($product->quantity_input>$product->quantity_output)
            <button class="btn btn-1" id="btn_add_to_card">Thêm vào giỏ hàng</button>
            <button class="btn btn-2" id="btn_buy_now">Mua ngay</button>
            @else
            <button class="btn btn-success py-1 d-flex gap-2 align-items-center justify-content-center w-auto"
              disabled><i class="bi bi-cart4 fs-5"></i> <span>Cháy hàng</span></button>
            @endif --}}
            {{-- <button class="btn btn-2" id="btn_buy_now">Mua ngay</button> --}}
            <button class="btn btn-1" id="btn_add_to_card">
              <div class="icon">
                <i class='bx bx-cart'></i>
              </div>
              <div class="text">
                <div class="txt-main text_1">Thêm vào giỏ hàng</div>
                <span class="text_2">Giao hàng tận nơi miễn phí</span>
              </div>
            </button>


          </div>
        </form>
        
        {{-- PHẦN THÔNG TIN KHUYỄN MÃI --}}
        <div class="khuyen-mai">
          <div class="title">
            <img width="64" height="64" src="//bizweb.dktcdn.net/100/485/131/themes/906771/assets/giftbox.png?1686556941849" alt="vouver"><span>Khuyến mãi đặc biệt !!!</span>
          </div>
          <div class="content">
            <ul>
              <li><img width="20" height="20" src="//bizweb.dktcdn.net/100/485/131/themes/906771/assets/km_product1.png?1686556941849" alt="Áp dụng Phiếu quà tặng/ Mã giảm giá theo ngành hàng.">Áp dụng Phiếu quà tặng/ Mã giảm giá theo ngành hàng.</li>
              <li><img width="20" height="20" src="//bizweb.dktcdn.net/100/485/131/themes/906771/assets/km_product2.png?1686556941849" alt="Giảm giá 10% khi mua từ 5 sản phẩm trở lên.">Giảm giá 10% khi mua từ 5 sản phẩm trở lên.</li>
              <li><img width="20" height="20" src="//bizweb.dktcdn.net/100/485/131/themes/906771/assets/km_product3.png?1686556941849" alt="Tặng 100.000₫ mua hàng tại website thành viên Dola Organic, áp dụng khi mua Online tại Hồ Chí Minh và 1 số khu vực khác.">Tặng 100.000₫ mua hàng tại website thành viên Dola Organic, áp dụng khi mua Online tại Hồ Chí Minh và 1 số khu vực khác.</li>
              
            </ul>
          </div>
        </div>
        {{-- PHẦN THÔNG TIN KHUYỄN MÃI --}}
        {{-- PHẦN GỌI TƯ VẤN --}}
        <div class="linehot_pro alert alert-warning mt-3 mb-3 d-flex align-items-center">
          <img class="mr-3 lazy loaded" alt="1900 123 321"
            src="//bizweb.dktcdn.net/100/434/011/themes/845632/assets/customer-service.png?1676652183181"
            data-src="//bizweb.dktcdn.net/100/434/011/themes/845632/assets/customer-service.png?1676652183181">
          <div class="b_cont font-weight-bold ml-3">
            <span class="d-block">
              Gọi ngay <a href="tel:1900123321" title="1900688688">1900 688 688</a> để được tư vấn tốt nhất!
            </span>
          </div>
        </div>
        {{-- PHẦN GỌI TƯ VẤN --}}
      </div>
    </div>
    <div class="mt-4">
      {{-- @if (count(json_decode($coupons))>=1)
      <x-AppCouponCard :list="$coupons" />
      @endif --}}
    </div>
    <div class="product-detail--other mt-4">
      <h3 class="title underline">Thông tin chi tiết</h3>
      <div>{!!$product->mota!=""?$product->mota:'Đang cập nhật'!!}</div>
    </div>

    
    {{-- PHẦN HIỂN THỊ SẢN PHẨM LIÊN QUAN --}}
    <section class="app-section pt-3 pb-3">
      <div class="container">
        <div class="products-row">
          <div class="product-row__header position-relative d-flex">
            <h2 class="title mb-0 "><a href="">Sản phẩm liên quan</a></h2>
            <div class="position-relative navigate">
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
            </div>
          </div>
          <div class="swiper mySwiperProductRelates">
            <div class="swiper-wrapper">
              @foreach ($product_relate as $item)
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

    {{-- Phần hiển thị comment --}}
    <hr>
    <div class="container mt-4 text-color">
      <div class="row mb-5">
        <div class="col-6 ">
            <h3 class="title">Viết bình luận</h3>
            <form method="POST" action="{{route('clientcomment')}}" id="article_comments" accept-charset="UTF-8" class="comment-form">
                @csrf
                @if (Auth::guard('web')->check()==false)
                <p class="alert alert-warning">
                    Vui lòng đăng nhập để thực hiện chức năng bình luận
                </p>
                @endif
                <input type="text" name="idND" value="{{Auth::guard('web')->user()->id??null}}" hidden>
                <input type="text" name="idSP" value="{{$product->idSP}}" hidden>
                <div class="row comment-form">
                    <div class="col-12 form-group">
                        <input type="text" class="form-control" placeholder="Tên *" title="Tên" name="name" value="{{Auth::guard('web')->user()->name??null}}" hidden>
                    </div>
                </div>
                <div class="field aw-blog-comment-area form-group">
                    <textarea rows="6" cols="50" class="form-control" title="Nội dung *" placeholder="Nội dung*"
                        name="content">
                    </textarea>
                    <span class="text-danger">@error('content')
                        {{$message}}
                        @enderror</span>
                </div>
                <div style="width:96%" class="button-set">
                    <button type="submit"
                        class="book-submit btn btn-primary text-center d-flex align-items-center font-weight-boldt font-weight-bold"
                        @disabled(Auth::guard('web')->check()==true?false:true) >Gửi bình luận
                    </button>
                </div>
            </form>
        </div>
        <div class="col-6">
            <h3 class="title">Bình luận</h3>
            @if (count($binhluans)>0)
            @foreach ($binhluans as $binhluan )
            <div class="comment-container">
                <div class="comment-header">
                    @if ($binhluan->avatar == '')
                        <img src="{{asset('upload/images/bx_user_circle.png')}}" alt="" width="40px" height="40px">
                    @else <img src="{{$binhluan->avatar}}" alt="" width="40px" height="40px">
                    @endif
                    {{-- <img src="https://via.placeholder.com/40x40" alt="Avatar"> --}}
                    <h4>{{$binhluan->name}}</h4>
                </div>
                <div class="comment-body">
                    <p>{{$binhluan->noiDung}}</p>
                </div>
                <div class="comment-footer">  
                    <span>Thích</span>
                    <span>Trả lời</span>
                    <span>{{ $binhluan->ngayBL->format('d/m/Y') }}</span>
                    {{-- <a href="#">Xóa</a> --}}
                </div>
            </div>
            @endforeach
            @else
            <p class="alert alert-warning">
                Hiện tại chưa có bình luận.
            </p>
            @endif
        </div>
      </div>
    </div>

    {{-- End phần hiển thị comment --}}

  </div>
  <div class="related-products d-sm-block d-none">
    <div class="sidebar">
      {{-- PHẦN CHÍNH SÁCH --}}
      <div class="chinhsach-pro">
        <div class="title-head">
          Chính sách cửa hàng
          <img class="lazyload loaded" src="//bizweb.dktcdn.net/100/485/131/themes/906771/assets/leaf.png?1686556941849" data-src="//bizweb.dktcdn.net/100/485/131/themes/906771/assets/leaf.png?1686556941849" alt="title" data-was-processed="true">

        </div>
        <div class="row">

          <div class="col-12">
            <div class="item">
              <img width="40" height="40" src="//bizweb.dktcdn.net/100/485/131/themes/906771/assets/chinhsach_1.png?1686556941849" alt="Miễn phí vẫn chuyển">
              <div class="text">
                <span class="title">Miễn phí vẫn chuyển</span>
                <span class="des">Cho tất cả đơn hàng trong nội thành Hồ Chí Minh</span>
              </div>
            </div>
          </div>


          <div class="col-12">
            <div class="item">
              <img width="40" height="40" src="//bizweb.dktcdn.net/100/485/131/themes/906771/assets/chinhsach_2.png?1686556941849" alt="Miễn phí đổi - trả">
              <div class="text">
                <span class="title">Miễn phí đổi - trả</span>
                <span class="des">Đối với sản phẩm lỗi sản xuất hoặc vận chuyển</span>
              </div>
            </div>
          </div>


          <div class="col-12">
            <div class="item">
              <img width="40" height="40" src="//bizweb.dktcdn.net/100/485/131/themes/906771/assets/chinhsach_3.png?1686556941849" alt="Hỗ trợ nhanh chóng">
              <div class="text">
                <span class="title">Hỗ trợ nhanh chóng</span>
                <span class="des">Gọi Hotline: <a href="tel:19006750">19006750</a> để được hỗ trợ ngay</span>
              </div>
            </div>
          </div>

          <div class="col-12">
            <div class="item">
              <img width="40" height="40" src="//bizweb.dktcdn.net/100/485/131/themes/906771/assets/chinhsach_4.png?1686556941849" alt="Ưu đãi combo">
              <div class="text">
                <span class="title">Ưu đãi combo</span>
                <span class="des">Mua theo combo,mùa càng mua nhiều giá càng rẻ </span>
              </div>
            </div>
          </div>

        </div>
      </div>
      {{-- KET THUC PHAN CHÍNH SÁCH --}}
      <div class="chinhsach-pro">
        <div class="title-head">
          Mã khuyến mãi
          <img class="lazyload loaded" src="//bizweb.dktcdn.net/100/485/131/themes/906771/assets/leaf.png?1686556941849" data-src="//bizweb.dktcdn.net/100/485/131/themes/906771/assets/leaf.png?1686556941849" alt="title" data-was-processed="true">
        </div>
        <div class="section_list_coupons">
          @foreach ($coupons as $item)
            <x-AppCouponCard maGiamGia="{{$item->maGiamGia}}" chiTiet="{{$item->chiTiet}}" ngayBatDau="{{$item->ngayBatDau}}" ngayKetThuc="{{$item->ngayKetThuc}}" />
            
           @endforeach
        </div>
      </div>

      <img
        src="https://scontent.fsgn2-7.fna.fbcdn.net/v/t39.30808-6/219284243_343850734042591_481454821461992375_n.jpg?stp=dst-jpg_p843x403&_nc_cat=100&ccb=1-7&_nc_sid=730e14&_nc_ohc=Vb6Lj4eKW_UAX-LO1Y0&_nc_ht=scontent.fsgn2-7.fna&oh=00_AfA9Wfgfk21Tv5KIwq09B_fa0r05CmM1OeLxpomr6zw9EQ&oe=63F885EA"
        alt="" class="banner">
    </div>
  </div>
</section>
<section class="container" style="margin-top: 20px">

</section>
@endsection
@section('js')
<script>
  var mySwiperProductDetailGallery = new Swiper(".mySwiperProductRelates", {
      spaceBetween: 10,
      slidesPerView: 4,
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
          slidesPerView: 4,
          spaceBetween: 20,
        },
      },
    });
    var mySwiperProductDetailThumb = new Swiper(".mySwiperProductDetailThumb", {
      spaceBetween: 10,
      thumbs: {
        swiper: mySwiperProductDetailGallery,
      },
    });
    

  //  PHẦN CSS CHO THÊM SỐ LƯỢNG SẢN PHẨM
  const formAdd = document.querySelector('#form-add')
    const productId = document.querySelector('[name=productId]').value
    const amount = formAdd.querySelector('.input-amount')
    const btnAdd = formAdd.querySelector('.btn-amount.add')
    const btnDesc = formAdd.querySelector('.btn-amount.desc')
    const btn_add_to_card=$('#btn_add_to_card')
    const btn_buy_now=$('#btn_buy_now')

    btn_buy_now.click((e)=>{
      e.preventDefault();
      formAdd.action='http://127.0.0.1:8000/buy-now';
      formAdd.submit()
      console.log(formAdd.acction)
    })
    btn_add_to_card.click((e)=>{
      formAdd.action='http://127.0.0.1:8000/add-to-cart';
      e.preventDefault();
      formAdd.submit()

    })
    const btnOrderNow = formAdd.querySelector('.btnOrder-now')
    btnAdd.onclick = () => {
        amount.value++
    }
    btnDesc.onclick = () => {
      if (amount.value > 1) {
          amount.value--
        }
    }
  
</script>
@endsection