@extends('client.appLayout.index')
@section('main-content')
<link rel="stylesheet" href="{{asset('css/client/news_index.css')}}">
<section class="bread-crumb"
    style="background: linear-gradient(0deg, rgba(0,0,0,0.8), rgba(0,0,0,0.3)),  url(//bizweb.dktcdn.net/100/485/131/themes/906771/assets/breadcrumb.jpg?1686556941849) no-repeat center;">

    <div class="container">
        <div class="title-bread-crumb">
            Bài viết
        </div>
        <nav aria-label="breadcrumb  ">
            <ol class=" breadcrumb p-3" @style("margin:0;padding-left:0px")>
                <li class="breadcrumb-item"><a href="{{route('client')}}">Trang trủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Bài viết</li>
            </ol>
        </nav>
    </div>
</section>
<div class="container" >
  <div class="main mt-2">
    <div class="main_content" style="width: 100%">
      <div class="row">
        <div class="col-12">
          <div style="display: grid;grid-template-columns:repeat(4,1fr);gap :20px;margin-top: 20px;">

            @foreach ($news as $item )
            <x-NewsCard isRow={{false}} link="{{route('clientnews-detail', $item->slug)}}"
              title="{{$item->tieuDe}}"
              thumb="{{$item->thumbNail}}"
              summary="{{$item->noiDung}} "
              day="{{date('d/m/Y',strtotime($item->ngayDang))}}"
              />
              @endforeach
          </div>
          <div class="d-flex justify-content-center mt-4">{{$news->appends(request()->all())->links()}}</div>
        </div>
      </div>

    </div>

  </div>
</div>

<script>
  $('.nav-link').on('click', function() {
	$('.active-link').removeClass('active-link');
	$(this).addClass('active-link');
});
</script>
<script>
  var title = document.getElementsByClassName("change_title");
            var nav_link = document.getElementsByClassName("nav-link");
            var underline = document.getElementsByClassName("underline");
            for (let i = 0; i < nav_link.length; i++) {
              nav_link[i].addEventListener("click", function () {
                for (let j = 0; j < nav_link.length; j++) {
                  nav_link[j].classList.remove("active-link");
                  underline[j].style.width = "0";
                }
                nav_link[i].classList.add("active-link");
                underline[i].style.width = "100%";
                title[0].innerHTML = nav_link[i].innerText;
              });
            }
</script>

@endsection