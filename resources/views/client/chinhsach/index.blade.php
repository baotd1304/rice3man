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
              <li class="breadcrumb-item active" aria-current="page">Chính sách mua hàng</li>
            </ol>
          </nav>
        <div class="mt-2">
            <div class="about">
                <div class="col-main page-title">
                    <h1>Chính sách Mua hàng của Rice3Man - Nền tảng bán gạo sạch trực tuyến</h1>
                    <p>
                        Chào mừng đến với Rice3Man! Chúng tôi cam kết cung cấp cho bạn sản phẩm gạo sạch chất lượng cao và dịch vụ tuyệt vời. Dưới đây là chính sách mua hàng của chúng tôi, nhằm đảm bảo bạn có trải nghiệm mua sắm trực tuyến dễ dàng, an toàn và đáng tin cậy.
                    </p>
                    <!-- Các mục chính sách đã định dạng -->
                    <ol>
                        <li>
                            <strong>Chất lượng sản phẩm:</strong> Chúng tôi cam kết cung cấp các loại gạo sạch được sản xuất và chọn lọc cẩn thận. Nông sản mà chúng tôi cung cấp đều được kiểm định và đảm bảo đạt tiêu chuẩn về chất lượng và an toàn thực phẩm.
                        </li>
                        <li>
                            <strong>Thông tin sản phẩm:</strong> Chúng tôi cung cấp thông tin chi tiết và minh bạch về từng loại gạo, bao gồm nguồn gốc, quy trình sản xuất, thành phần dinh dưỡng và hạn sử dụng. Quý khách có thể dễ dàng tìm hiểu về sản phẩm trước khi quyết định mua hàng.
                        </li>
                        <li>
                            <strong>Đơn hàng và thanh toán:</strong> Quý khách có thể đặt hàng trực tuyến thông qua trang web của chúng tôi. Chúng tôi hỗ trợ nhiều phương thức thanh toán đảm bảo tính tiện lợi và an toàn cho bạn, bao gồm thanh toán bằng thẻ tín dụng, chuyển khoản ngân hàng và ví điện tử.
                        </li>
                        <li>
                            <strong>Giao hàng và vận chuyển:</strong> Chúng tôi cam kết giao hàng nhanh chóng và đáng tin cậy. Thời gian giao hàng dự kiến sẽ được hiển thị rõ ràng khi bạn đặt hàng. Chúng tôi sử dụng các đối tác vận chuyển đáng tin cậy để đảm bảo sản phẩm đến tay bạn một cách an toàn và kịp thời.
                        </li>
                    </ol>
                    <!-- Đoạn văn hướng dẫn đổi trả -->
                    <h2>Hướng dẫn đổi trả</h2>
                    <p>
                        <strong>Chính sách hoàn trả và đổi trả:</strong> Chúng tôi chấp nhận hoàn trả và đổi trả sản phẩm trong trường hợp sản phẩm không đúng với mô tả hoặc bị hỏng hóc trong quá trình vận chuyển. Quý khách vui lòng kiểm tra sản phẩm ngay khi nhận hàng và thông báo cho chúng tôi trong vòng 7 ngày kể từ ngày nhận hàng nếu có bất kỳ vấn đề nào.
                    </p>
                    <p>
                        Để yêu cầu đổi trả, vui lòng thực hiện các bước sau:
                    </p>
                    <ol>
                        <li>
                            Liên hệ với bộ phận hỗ trợ khách hàng của chúng tôi qua email hoặc số điện thoại để thông báo về vấn đề sản phẩm và yêu cầu đổi trả.
                        </li>
                        <li>
                            Gói sản phẩm cẩn thận và trả hàng về địa chỉ của chúng tôi. Chúng tôi khuyến nghị bạn sử dụng dịch vụ vận chuyển có mã số theo dõi để đảm bảo việc trả hàng được theo dõi và đảm bảo.
                        </li>
                        <li>
                            Sau khi nhận được sản phẩm trả về và xác nhận tình trạng sản phẩm, chúng tôi sẽ tiến hành hoàn tiền hoặc đổi trả sản phẩm mới cho bạn trong thời gian sớm nhất.
                        </li>
                    </ol>
                    <!-- Đoạn hướng dẫn thanh toán -->
                    <h2>Hướng dẫn thanh toán</h2>
                    <p>
                        Chúng tôi hỗ trợ các phương thức thanh toán sau đây để bạn có thể thanh toán mua hàng một cách dễ dàng và an toàn:
                    </p>
                    <ul>
                        <li>
                            <strong>Thanh toán bằng thẻ tín dụng:</strong> Chúng tôi chấp nhận các loại thẻ tín dụng phổ biến như Visa, MasterCard, American Express, JCB và Discover. Bạn chỉ cần nhập thông tin thẻ tín dụng khi thanh toán và giao dịch sẽ được xử lý một cách an toàn và bảo mật.
                        </li>
                        <li>
                            <strong>Chuyển khoản ngân hàng:</strong> Nếu bạn muốn thanh toán qua chuyển khoản ngân hàng, chúng tôi sẽ cung cấp thông tin tài khoản ngân hàng của chúng tôi để bạn tiến hành chuyển tiền. Vui lòng ghi rõ thông tin đơn hàng khi thực hiện chuyển khoản.
                        </li>
                        <li>
                            <strong>Ví điện tử:</strong> Chúng tôi hỗ trợ thanh toán qua các ví điện tử phổ biến như PayPal, ZaloPay, Momo, v.v. Bạn chỉ cần đăng nhập vào tài khoản ví điện tử và xác nhận thanh toán.
                        </li>
                    </ul>
                    <p>
                        Sau khi bạn hoàn tất thanh toán, chúng tôi sẽ tiến hành xác nhận đơn hàng và bắt đầu quá trình vận chuyển sản phẩm đến tay bạn.
                    </p>
                    <!-- Các mục chính sách tiếp theo -->
                    <p>
                        <strong>Bảo mật thông tin:</strong> Chúng tôi cam kết bảo mật thông tin cá nhân của bạn. Mọi thông tin cá nhân sẽ được bảo mật và không được tiết lộ cho bên thứ ba.
                    </p>
                    <p>
                        <strong>Hỗ trợ khách hàng:</strong> Đội ngũ hỗ trợ khách hàng của chúng tôi luôn sẵn sàng hỗ trợ bạn trong quá trình mua hàng và giải đáp mọi thắc mắc. Quý khách có thể liên hệ với chúng tôi qua email, số điện thoại hoặc chat trực tiếp trên trang web.
                    </p>
                    <p>
                        <strong>Giá cả và khuyến mãi:</strong> Chúng tôi cam kết cung cấp sản phẩm với giá cả hợp lý và cạnh tranh. Ngoài ra, chúng tôi sẽ thường xuyên tổ chức các chương trình khuyến mãi, giảm giá và ưu đãi đặc biệt cho khách hàng thân thiết.
                    </p>
                    <p>
                        Cảm ơn bạn đã tin tưởng và lựa chọn Rice3Man là địa chỉ mua sắm gạo sạch trực tuyến. Chúng tôi luôn nỗ lực để mang đến cho bạn những trải nghiệm tốt nhất và đáng nhớ trong mỗi giao dịch.
                    </p>
                </div>
                </div>

            </div>
        </div>
    </div>
@endsection