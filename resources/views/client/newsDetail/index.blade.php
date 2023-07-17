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
                <li class="breadcrumb-item"><a href="{{route('client')}}">Trang trủ</a></li>
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
                <input type="text" name="user_id" value="{{Auth::guard('web')->user()->id??null}}" hidden>
                <input type="text" name="news_id" value="{{$post->id}}" hidden>
                {{-- <div class="row comment-form">
                    <div class="col-12 form-group">
                        <input type="text" class="form-control" placeholder="Tên *" title="Tên" name="name" value="">
                    </div>
                    <div class="col-12 form-group">
                        <input class="form-control" title="E-mail" type="email" placeholder="E-mail *" name="email"
                            value="">
                    </div>
                </div> --}}
                <div class="field aw-blog-comment-area form-group">
                    <textarea rows="6" cols="50" class="form-control" title="Nội dung *" placeholder="Nội dung*"
                        name="content"></textarea>
                    <span class="text-danger">@error('content')
                        {{$message}}
                        @enderror</span>
                </div>
                <div style="width:96%" class="button-set">
                    <button type="submit"
                        class="book-submit btn btn-primary text-center d-flex align-items-center font-weight-boldt font-weight-bold"
                        @disabled(Auth::guard('web')->check()==true?false:true) >Gửi
                        bình luận
                    </button>
                </div>
            </form>
        </div>
        <div class="col-6">
            <h3 class="title">Bình luận</h3>
            @if (count($comments)>0)
            @foreach ($comments as $item )
            <div class="comment-container">
                <div class="comment-header">
                    <img src="https://via.placeholder.com/40x40" alt="Avatar">
                    <h4>{{$item->author->username}}</h4>
                </div>
                <div class="comment-body">
                    <p>{{$item->content}}</p>
                </div>
                <div class="comment-footer">
                    <span>Thích</span>
                    <span>Trả lời</span>
                    <span>{{ $item->created_at->format('d/m/Y') }}</span>
                    <a href="#">Xóa</a>
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
    <div class="row">
        <h3 class="title">Bài viết liên quan</h3>
        <div class="col-12">
            <div style="display: grid;grid-template-columns:repeat(4,1fr);gap :10px;margin-top: 20px;">
  
              @foreach ($newsRelate as $item )
              <x-NewsCard isRow={{false}} link="{{route('clientnews-detail',['id'=>$item->idBV])}}"
                title="{{$item->tieuDe}}"
                thumb="{{$item->thumbNail}}"
                summary="{{$item->noiDung}} "/>
                
                @endforeach
            </div>
    </div>
</div>

@endsection