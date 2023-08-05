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
              <li class="breadcrumb-item active" aria-current="page">Về chúng tôi</li>
            </ol>
          </nav>
        <div class="mt-2">
            <div class="about">
                <div class="col-main page-title">
                <h1>Chào mừng đến với cửa hàng Rice 3 man</h1>
                <p>

                    Rice 3 Man là chuỗi cửa hàng chuyên cung cấp gạo tươi mới, sạch sẽ và tinh hoa, với mục tiêu giúp người tiêu dùng Việt Nam có một cuộc sống khỏe mạnh hơn thông qua những hạt gạo chất lượng cao, không có nguồn gốc biến đổi gene (GMO) và được chọn lựa kỹ càng từ nhà sản xuất uy tín.
                    
                    Chúng tôi tận tâm lựa chọn các loại gạo ngon từ những cánh đồng trồng lúa hữu cơ, đảm bảo các tiêu chuẩn chất lượng được cấp bởi các tổ chức uy tín trên thế giới. Chúng tôi yêu thích những gì chúng tôi làm và đam mê những lợi ích của việc cung cấp những hạt gạo tốt nhất cho cuộc sống lành mạnh của mọi người.
                    
                    Với lòng đam mê và sứ mệnh cao cả, Rice 3 Man tự hào đồng hành cùng cộng đồng trong việc xây dựng một cộng đồng gạo tươi, sạch sẽ và tự nhiên. Chúng tôi tin tưởng rằng gạo hữu cơ và tự nhiên là lựa chọn tốt cho sức khỏe, tốt hơn cho cộng đồng và tốt hơn cho hành tinh mà chúng ta đang sống.
                    
                    Hãy đồng hành cùng Rice 3 Man trên hành trình khám phá những hạt gạo tinh hoa và tận hưởng sự tươi mới và sạch sẽ từ mỗi hạt gạo. Cảm ơn bạn đã đồng hành cùng chúng tôi và chúng tôi hy vọng mang lại những trải nghiệm tuyệt vời nhất cho bạn và gia đình!</p>
                 <h1>SỨ MỆNH KINH DOANH </h1>
                 <p>Sứ mệnh của Rice 3 Man đó là giúp mọi người dễ dàng tiếp cận hơn với những hạt gạo hữu cơ, gạo tự nhiên. Chúng tôi không chỉ cung cấp những sản phẩm gạo hữu cơ chất lượng cao mà còn đem đến những thông tin hữu ích về lợi ích mà gạo hữu cơ mang lại cho sức khỏe con người và cộng đồng.

                    Chúng tôi luôn hiểu rõ rằng mỗi người có nhu cầu và cách tiếp cận với gạo hữu cơ, gạo tự nhiên theo một cách khác nhau, và vì vậy, chúng tôi đặt mục tiêu hỗ trợ bạn một cách tốt nhất bằng cách:
                    
                    Chỉ cung cấp những loại gạo hữu cơ, gạo tự nhiên đạt những chứng nhận uy tín nói chung và được kiểm chứng bởi các tổ chức đáng tin cậy, như Organicfood.vn, nhằm đảm bảo sự an toàn và chất lượng tuyệt vời cho mỗi hạt gạo.
                    
                    Khởi tạo và duy trì những mối quan hệ tích cực, lâu dài và đáng tin cậy giữa Rice 3 Man với khách hàng, nhân viên, nhà cung cấp và cộng đồng. Chúng tôi luôn đặt lợi ích của cộng đồng lên hàng đầu và tôn trọng mỗi đối tác trong chuỗi cung ứng của chúng tôi.
                    
                    Hỗ trợ phát triển các trang trại và cộng đồng nhỏ ở vùng sâu vùng xa, vùng dân tộc ít người và các đối tượng dễ bị tổn thương trong xã hội, bằng cách hướng dẫn và hỗ trợ họ canh tác gạo theo phương pháp hữu cơ, phương pháp tự nhiên để đạt được cuộc sống tốt đẹp hơn và bền vững hơn.
                    
                    Chúng tôi xin cam kết tiếp tục nỗ lực không ngừng trong việc đem đến những sản phẩm gạo tốt nhất và mang đến những lợi ích thực sự cho mỗi người và cho cộng đồng. Cảm ơn bạn đã đồng hành cùng Rice 3 Man trong hành trình chung tay xây dựng một cộng đồng gạo tươi, sạch sẽ và đầy ý nghĩa!</p>
                <h1>LAN TOẢ ĐIỀU TỐT VÀ NHIỀU HƠN NỮA LUÔN TƯƠI NGON  </h1>
                <p>Là khách hàng của Rice 3 man bạn không cần phải dành hàng giờ đi chợ hay siêu thị để tìm kiếm gạo vì chúng tôi làm điều đó cho bạn và sau đó đưa bạn đến tận nhà bạn. Chúng tôi chọn những loại gạo ngon và có chứng nhận. Trong quá trình đóng gói của chúng tôi, chúng tôi cũng đảm bảo rằng chất lượng của tất cả các sản phẩm được kiểm tra thêm để sản phẩm được giao là tiêu chuẩn tốt nhất. </p>
               <h1>DỊCH VỤ CSKH TUYỆT VỜI </h1>
                    <p>Nhiệm vụ của chúng tôi là cung cấp dịch vụ tốt nhất cho khách hàng, giúp bạn tận hưởng trải nghiệm mua sắm tuyệt vời nhất. Chúng tôi thích tương tác với khách hàng của mình và chúng tôi luôn hoan nghênh phản hồi về dịch vụ của các bạn. Đó là cách mà chúng tôi hiểu các bạn hơn, cũng như làm tốt dịch vụ của mình hơn, hoàn thiện mình hơn nữa từng gày. </p>
                    <h1>GIÁ TRỊ THỰC SỰ </h1>
                    <p>Hầu hết các sản phẩm gạo mà chúng tôi cung cấp đều được chứng nhận hữu cơ, đồng nghĩa rằng chúng tuân thủ các tiêu chuẩn cao về canh tác hữu cơ và không sử dụng các hóa chất và phụ gia độc hại. Ngoài ra, chúng tôi cũng canh tác một số diện tích theo hướng hữu cơ và thuần tự nhiên, tạo điều kiện thuận lợi cho các người trồng địa phương tham gia vào quy trình sản xuất.

                        Chúng tôi cam kết đảm bảo rằng tất cả các quy trình và hệ thống của chúng tôi đều được kiểm tra và tuân thủ nghiêm ngặt nhằm đảm bảo chất lượng tốt nhất cho từng hạt gạo. Các đối tác của chúng tôi, bao gồm cả người trồng địa phương, đều tham gia vào quy trình canh tác theo hướng hữu cơ và tự nhiên, và chúng tôi đảm bảo rằng các quy trình này được thực hiện đúng quy định và đạt các tiêu chuẩn cần thiết.
                        
                        Bạn có thể hoàn toàn yên tâm rằng các sản phẩm gạo mà chúng tôi cung cấp không chỉ đảm bảo về chất lượng mà còn đề cao tính bền vững của quy trình sản xuất. Đối với Rice 3 Man, việc đảm bảo sự tin tưởng và hài lòng của khách hàng là ưu tiên hàng đầu, và chúng tôi cam kết luôn duy trì tiêu chuẩn cao nhất trong mỗi sản phẩm mà chúng tôi mang đến.</p>
          
          
                </div>
                </div>

            </div>
        </div>
    </div>
@endsection