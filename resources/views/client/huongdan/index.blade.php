@extends('client.appLayout.index')
@section('css')
<link rel="stylesheet" href="{{asset('css/client/contact.css')}}">

<!-- LINK CSS -->
@endsection
@section('main-content')
    <div class="about container ">
        <nav aria-label="breadcrumb  " @style("border-bottom:1px solid #eae8e8; ")>
            <ol class="breadcrumb p-3" @style("margin:0;padding-left:0px")>
              <li class="breadcrumb-item"><a href="{{route('client')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Hướng dẫn mua hàng</li>
            </ol>
          </nav>
        <div class="mt-2">
            <div class="about">
                <div class="col-main page-title">
                <h1>Hướng dẫn mua hàng tại rice 3 man</h1>
                Bước 1: Truy cập website và lựa chọn sản phẩm cần mua
                <br>

Bước 2: Click và sản phẩm muốn mua, màn hình hiển thị ra pop up với các lựa chọn sau <br>

Nếu bạn muốn tiếp tục mua hàng: Bấm vào phần tiếp tục mua hàng để lựa chọn thêm sản phẩm vào giỏ hàng <br>

Nếu bạn muốn xem giỏ hàng để cập nhật sản phẩm: Bấm vào xem giỏ hàng <br>

Nếu bạn muốn đặt hàng và thanh toán cho sản phẩm này vui lòng bấm vào: Đặt hàng và thanh toán <br>

Bước 3: Lựa chọn thông tin tài khoản thanh toán <br>

Nếu bạn đã có tài khoản vui lòng nhập thông tin tên đăng nhập là email và mật khẩu vào mục đã có tài khoản trên hệ thống <br>

Nếu bạn chưa có tài khoản và muốn đăng ký tài khoản vui lòng điền các thông tin cá nhân để tiếp tục đăng ký tài khoản. Khi có tài khoản bạn sẽ dễ dàng theo dõi được đơn hàng của mình
 <br>
Nếu bạn muốn mua hàng mà không cần tài khoản vui lòng nhấp chuột vào mục đặt hàng không cần tài khoản <br>

Bước 4: Điền các thông tin của bạn để nhận đơn hàng, lựa chọn hình thức thanh toán và vận chuyển cho đơn hàng của mình <br>

Bước 5: Xem lại thông tin đặt hàng, điền chú thích và gửi đơn hàng <br>

Sau khi nhận được đơn hàng bạn gửi chúng tôi sẽ liên hệ bằng cách gọi điện lại để xác nhận lại đơn hàng và địa chỉ của bạn. <br>

Trân trọng cảm ơn. <br>
          
                </div>
                </div>

            </div>
        </div>
    </div>
@endsection