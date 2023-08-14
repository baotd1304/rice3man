@extends('client.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/client/newsDetail.css')}}">
@endsection
@section('main-content')
<section class="bread-crumb"
    style="background: linear-gradient(0deg, rgba(0,0,0,0.8), rgba(0,0,0,0.3)),  url(//bizweb.dktcdn.net/100/485/131/themes/906771/assets/breadcrumb.jpg?1686556941849) no-repeat center;">

    <div class="container">
        <div class="title-bread-crumb">
            {{$post->tieuDe}}
        </div>
        <nav aria-label="breadcrumb  ">
            <ol class=" breadcrumb p-3" @style("margin:0;padding-left:0px")>
                <li class="breadcrumb-item"><a href="{{route('client')}}">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$post->tieuDe}}</li>
            </ol>
        </nav>
    </div>
</section>
<div class="container mt-4 text-color">
    <div class="row pb-5 border-bottom mb-3">
        <article class="col-lg-12 col-xs-12">
            <div class="entry-date">
                <p>Đăng bởi: <b>{{$post->tacGia}} -</b></p>
            </div>
            <div class="table-of-contents">
                {!!$post->noiDung!!}
            </div>
        </article>
    </div>
    
    <div class="row">
        <h3 class="title">Bài viết cùng tác giả</h3>s
        <div class="col-12">
            <div style="display: grid;grid-template-columns:repeat(4,1fr);gap :10px;margin-top: 20px;">
  
                @foreach ($newsRelate as $bv )
                <x-NewsCard isRow={{false}} link="{{route('clientnews-detail', $bv->slug])}}"
                    title="{{$bv->tieuDe}}"
                    thumb="{{$bv->thumbNail}}"
                    summary="{{$bv->noiDung}}"
                    link="{{route('clientnews-detail', $bv->slug)}}"
                    day="{{date('d/m/Y',strtotime($bv->ngayDang))}}"
                    />
                    
                @endforeach
            </div>
    </div>
</div>

@endsection