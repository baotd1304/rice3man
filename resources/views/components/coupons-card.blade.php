<link rel="stylesheet" href="{{asset('css/client/component/couponCard.css')}}">
<section class="section_coupon">
    <div class="item">
        <div class="content_wrap">
            <div class="content-top">
            <a title="Chi tiết" href="javascript:void()" class="info-button" id="info-button" data-coupon="{{$maGiamGia}}" 
                    data-time="{{$ngayKetThuc}}" data-content="{{$dieuKien}}<br>
                        Không đi kèm với chương trình khác">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512">
                    <path d="M144 80c0 26.5-21.5 48-48 48s-48-21.5-48-48s21.5-48 48-48s48 21.5 48 48zM0 224c0-17.7 14.3-32 32-32H96c17.7 0 32 14.3 32 32V448h32c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H64V256H32c-17.7 0-32-14.3-32-32z"></path>
                </svg>
            </a>
                {{$maGiamGia}} 
                <span>{{$chiTiet}}</span>
                <span>HSD: {{$ngayKetThuc? date('d/m/Y H:i:s',strtotime($ngayKetThuc)) : 'không giới hạn'}}</span>
            </div>
            <div class="content-bottom">
                
                <div class="coupon-code js-copy" id="copy_btn" data-copy="{{$maGiamGia}}" title="Sao chép">
                    Sao chép 
                    <input type="text" name="couponCode" value={{$maGiamGia}} hidden>
                </div>
                @if (isset($_COOKIE["couponCode"])&&$_COOKIE["couponCode"]==$maGiamGia)
                    <div class="coupon-code btn-used">
                        Đã sử dụng
                        <i class='bx bx-check'></i>
                    </div>
                @else
                <form action="{{route('clientuse-coupon-code')}}" method="POST">
                    @csrf
                    <input type="text" value={{$maGiamGia}} name="couponCode" hidden>
                    <button class="btn btn-sm coupon-code m_copy">
                        Sử dụng
                    </button>
                </form>
                @endif

            </div>
        </div>
    </div>
</section>

<div class="popup-coupon">
    <div class="content">
        <div class="title">
            Thông tin voucher
        </div>
        <a href="javascript:void(0)" class="close-popup">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve"> <g> <g> <path d="M284.286,256.002L506.143,34.144c7.811-7.811,7.811-20.475,0-28.285c-7.811-7.81-20.475-7.811-28.285,0L256,227.717    L34.143,5.859c-7.811-7.811-20.475-7.811-28.285,0c-7.81,7.811-7.811,20.475,0,28.285l221.857,221.857L5.858,477.859    c-7.811,7.811-7.811,20.475,0,28.285c3.905,3.905,9.024,5.857,14.143,5.857c5.119,0,10.237-1.952,14.143-5.857L256,284.287    l221.857,221.857c3.905,3.905,9.024,5.857,14.143,5.857s10.237-1.952,14.143-5.857c7.811-7.811,7.811-20.475,0-28.285    L284.286,256.002z"></path> </g> </g> </svg>		
        </a>
            <ul>
                <li>
                    <span>Mã giảm giá:</span>
                    <span class="coupon">{{$maGiamGia}}</span>
                </li>
                <li>
                    <span>Ngày hết hạn:</span>
                    <span class="time">{{$ngayKetThuc? date('d/m/Y H:i:s',strtotime($ngayKetThuc)) : 'không giới hạn'}}</span>
                </li>
                <li>
                    <span>Điều kiện:</span>
                    <span class="dieukien">Áp dụng với đơn hàng trên {{number_format($dieuKien,0,',','.')}} đ
                        <br> Không đi kèm với chương trình khác
                    </span>
                </li>
            </ul>
    </div>
</div>



<script>
    $(document).ready(function () {
        $(".js-copy").click(function () {
            $(this).find('input').select();
            // $(this).find('input').setSelectionRange(0, 99999);
            navigator.clipboard.writeText( $(this).find('input').val());

        });

        $(".item .info-button").click(function () { 
            $('.popup-coupon').addClass('active');
            return false;
        })
        $(document).on('click','.close-popup', function() {   
            $('.popup-coupon').removeClass('active');
            return false;
        })
    });
    
</script>