@extends('client.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/client/cart.css')}}">
@endsection
@section('main-content')
<section class="bread-crumb"
    style="background: linear-gradient(0deg, rgba(0,0,0,0.8), rgba(0,0,0,0.3)),  url(//bizweb.dktcdn.net/100/485/131/themes/906771/assets/breadcrumb.jpg?1686556941849) no-repeat center;">

    <div class="container">
        <div class="title-bread-crumb">
            Giỏ hàng
        </div>
        <nav aria-label="breadcrumb  ">
            <ol class=" breadcrumb p-3" @style("margin:0;padding-left:0px")>
                <li class="breadcrumb-item"><a href="{{route('client')}}">Trang trủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
            </ol>
        </nav>
    </div>
</section>
<div class="container ">
    @if (count($carts)>0)
    <div class="row">
        <div class="col-12 col-md-9 mt-2 mb-2">
            {{-- PHẦN GIỎ HÀNG --}}
            <div class="cart-page d-xl-block d-none">
                <div class="drawer__inner">
                    <div class="CartPageContainer">
                        <div action="/cart" method="post" novalidate="" class="cart ajaxcart cartpage">
                            <div class="cart-header-info">
                                <div>Thông tin sản phẩm</div>
                                <div>Đơn giá</div>
                                <div>Số lượng</div>
                                <div>Thành tiền</div>
                            </div>
                            <div class="ajaxcart__inner ajaxcart__inner--has-fixed-footer cart_body items">
                                @foreach ($carts as $item)
                                <div class="ajaxcart__row">
                                    <div class="ajaxcart__product cart_product" data-line="1">
                                        <a href="{{route('clientproduct-detail', $item->idSP)}}"
                                            class="ajaxcart__product-image cart_image">
                                            <img src="{{ $item->urlHinh}}" alt="">
                                        </a>
                                        <div class="grid__item cart_info">
                                           
                                            <div class="ajaxcart__product-name-wrapper cart_name">
                                                <a href="{{route('clientproduct-detail', $item->idSP)}}"
                                                    class="ajaxcart__product-name h4">
                                                    {{$item->tenSP}}
                                                </a>
                                                <a class="cart__btn-remove remove-item-cart ajaxifyCart--remove"
                                                    href="javascript:;" data-line="1"> 
                                                    <form action="{{route('clientremove-to-cart')}}" method="POST">
                                                        @csrf
                                                        <input type="text" name="productId" value="{{$item->idSP}}"
                                                                hidden>
                                                        <button
                                                            class="cart__btn-remove remove-item-cart ajaxifyCart--remove">
                                                            xóa
                                                        </button>
                                                    </form>
                                                </a>

                                            </div>
                                            <div class="grid">
                                                <div class="grid__item one-half text-right cart_prices">
                                                    <span class="cart-price">{{number_format($item->giaSP,0,",",".")}}</span>

                                                </div>
                                            </div>
                                            <div class="grid">
                                                <div class="grid__item one-half cart_select">
                                                    <div class="ajaxcart__qty input-group-btn">
                                                        <form action="{{route('clientminus-to-cart')}}" method="POST">
                                                            @csrf
                                                            <input type="text" name="productId" value="{{$item->idSP}}"
                                                                hidden>
                                                            <input type="number" name="amount" value="1" hidden>
                                                            <button
                                                                class="minus ajaxcart__qty-adjust ajaxcart__qty--minus items-count">-</button>
                                                        </form>
                                                        <span class="count">{{$item->amount}}</span>
                                                        <form action="{{route('clientadd-to-cart')}}" method="POST">
                                                            @csrf
                                                            <input type="text" name="productId" value="{{$item->idSP}}"
                                                                hidden>
                                                            <input type="number" name="amount" value="1" hidden>
                                                            <button
                                                                class="plus ajaxcart__qty-adjust ajaxcart__qty--plus items-count"">+</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" grid">
                                                <div class="grid__item one-half text-right cart_prices">
                                                    <span class="cart-price">{{number_format($item->giaSP*$item->amount,0,",",".")}}</span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 mt-2 mb-2">
            <div class=" cart cart-page">
                <div class="ajaxcart__footer ajaxcart__footer--fixed cart-footer">
                    <div class="row">
                        <div class="ajaxcart__subtotal">
                            <div class="cart__subtotal">
                                <div class="cart__col-6">Tổng tiền:</div>
                               
                                <div class="text-right cart__totle"><span class="total-price">{{number_format($total,0,",",".")}}</span></div>
                            </div>
                        </div>
                        <div class="cart__btn-proceed-checkout-dt">
                            <a href="{{route('clientpayment')}}">
                                <button
                                    class="button btn btn-default cart__btn-proceed-checkout" id="btn-proceed-checkout"
                                    title="Thanh toán">Thanh toán
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <form action="{{route('clientremove-all-cart')}}" method="POST">
                    @csrf
                    {{-- <button style="width:100%" class="btn btn-delete-all">Xóa tất cả</button> --}}
                </form>
            </div>
            <div class="alert-success text-center mt-2">{{$couponMsg}}</div>
        </div>
    </div>
    @else
    <div class="alert alert-warning  my-3">Không có sản phẩm nào. Quay lại <b> <a
                href="{{route('clientcategory-group-all')}}"> trang sản phẩm </a> </b> để tiếp tục mua sắm.</div>
    @endif
</div>

<div class="container">
    {{-- @if (count(json_decode($coupons))>0)
    <x-AppCouponCard :list="$coupons" />
    @endif --}}
</div>
@endsection

@section("js")
<script>
    let minusBtn = document.querySelector(".minus");
        let count = document.querySelector(".count");
        let plusBtn = document.querySelector(".plus");

        let countNum = 1;
        count.value = countNum;

        minusBtn.addEventListener("click", () => {
            countNum -= 1;
            count.value = countNum;
        });

        plusBtn.addEventListener("click", () => {
            countNum += 1;
            count.value = countNum;
        });
</script>
@endsection