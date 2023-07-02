{{-- <link rel="stylesheet" href="{{asset('css/client/component/couponCard.css')}}">
<div class="m_giftbox my-4">

    <fieldset class="free-gifts p-3 pb-4 pb-md-3 rounded position-relative">
        <legend class="d-inline-block pl-3 pr-3 mb-0">
            <img alt="Code Ưu Đãi"
                src="//bizweb.dktcdn.net/thumb/icon/100/434/011/themes/845632/assets/gift.gif?1676652183181"> Code Ưu
            Đãi
        </legend>
        <div class="row">
            @foreach ($list as $d )
            <div class="col-12 col-md-6 col-lg-4">
                <div class="item line_b pb-2 none_mb">
                    <span class="mb-2 d-block ">
                        {{$d->description}}
                        <div class="d-flex gx-1">
                            <button class="btn mt-1 btn-sm m_copy text-white font-weight-bold pl-2 pr-2 d-block btn-copy-coupon-code"
                                data-copy={{$d->coupon_code}}>
                                Sao chép
                                <input type="text" value={{$d->coupon_code}} hidden>
                            </button>
                            @if (isset($_COOKIE["couponCode"])&&$_COOKIE["couponCode"]==$d->coupon_code)
                                <button class="btn mt-1 btn-sm m_copy text-white font-weight-bold pl-2 pr-2 d-block btn-used">
                                    Đã sử dụng
                                    <i class='bx bx-check'></i>
                                </button>
                            @else
                            <form action="{{route('clientuse-coupon-code')}}" method="POST">
                                @csrf
                                <input type="text" value={{$d->coupon_code}} name="couponCode" hidden>
                                <button class="btn mt-1 btn-sm m_copy text-white font-weight-bold pl-2 pr-2 d-block">
                                    Sử dụng
                                </button>
                            </form>
                            @endif
                        </div>
                    </span>
                </div>
            </div>
            @endforeach
            <div class="position-absolute vmore_c w-100 d-md-none">
                <a href="javascript:;" class="d-block v_more_coupon text-center font-weight-bold">
                    <b class="t1">Xem thêm mã ưu đãi</b>
                    <b class="t1 d-none">Thu gọn</b>
                </a>
            </div>
        </div>
    </fieldset>
    <script>
        $(document).ready(function () {
            $(".btn-copy-coupon-code").click(function () { 
                $(this).find('input').select()
                // $(this).find('input').setSelectionRange(0, 99999)
                navigator.clipboard.writeText( $(this).find('input').val());

            });
        });
      
    </script>
</div> --}}
<link rel="stylesheet" href="{{asset('css/client/component/couponCard.css')}}">
<section class="section_coupon">
<div class="item">
    <div class="content_wrap">
        <a title="Chi tiết" href="javascript:void(0)" class="info-button" data-coupon="DOLA10" data-time="1/10/2023" data-content="Áp dụng cho đơn hàng từ 200k trở lên<br>
Không đi kèm với chương trình khác">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512">
                <path d="M144 80c0 26.5-21.5 48-48 48s-48-21.5-48-48s21.5-48 48-48s48 21.5 48 48zM0 224c0-17.7 14.3-32 32-32H96c17.7 0 32 14.3 32 32V448h32c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H64V256H32c-17.7 0-32-14.3-32-32z"></path>
            </svg>
        </a>
        <div class="content-top">
            {{$maGiamGia}}
            <span>{{$chiTiet}}</span>
        </div>
        <div class="content-bottom">
            <span>HSD: {{$ngayKetThuc}}</span>
            <div class="coupon-code js-copy" data-copy="DOLA10" title="Sao chép">Sao chép</div>
            <input type="text" value={{$maGiamGia}} hidden>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(".js-copy").click(function () { 
            $(this).find('input').select()
            // $(this).find('input').setSelectionRange(0, 99999)
            navigator.clipboard.writeText( $(this).find('input').val());

        });
        $(".content_wrap .info-button").click(function () { 
            $('.popup-coupon').addClass('active');
            // $('body').removeClass('search-active');
            return false;
        })
        $(document).on('click','.close-popup', function() {   
            $('.popup-coupon').removeClass('active');
            // $('body').removeClass('search-active');
            return false;
        })
    });
  
</script>
</section>
<section class="section_coupon">
    <div class="popup-coupon">
        <div class="content">
            <div class="title">
                Thông tin voucher
            </div>
            <a href="javascript:void(0)" class="close-popup">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve"> <g> <g> <path d="M284.286,256.002L506.143,34.144c7.811-7.811,7.811-20.475,0-28.285c-7.811-7.81-20.475-7.811-28.285,0L256,227.717    L34.143,5.859c-7.811-7.811-20.475-7.811-28.285,0c-7.81,7.811-7.811,20.475,0,28.285l221.857,221.857L5.858,477.859    c-7.811,7.811-7.811,20.475,0,28.285c3.905,3.905,9.024,5.857,14.143,5.857c5.119,0,10.237-1.952,14.143-5.857L256,284.287    l221.857,221.857c3.905,3.905,9.024,5.857,14.143,5.857s10.237-1.952,14.143-5.857c7.811-7.811,7.811-20.475,0-28.285    L284.286,256.002z"></path> </g> </g> </svg>		</a>
            <ul> 
                <li>
                    <span>Mã giảm giá:</span>
                    <span class="code">{{$maGiamGia}}</span>
                </li>
                <li>
                    <span>Ngày hết hạn:</span>
                    <span class="time">{{$ngayKetThuc}}</span>
                </li>
                <li>
                    <span>Điều kiện:</span>
                    <span class="dieukien">Áp dụng cho đơn hàng từ 200k trở lên<br>
    Không đi kèm với chương trình khác</span>
                </li>
            </ul>
        </div>
    </div>
</section>
