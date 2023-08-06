<link rel="stylesheet" href="{{asset('css/client/component/newsCard.css')}}">
    <div class="item-blog">
        <div class="block-thumb">
            
            <a class="thumb news-card {{$isRow==true?'isRow':''}}" href="{{$link}}">
                <img class="lazyload loaded" src="{{asset($thumb)}}" data-src="" alt="loi hinh anh" style="height:400px">
            </a>
            
            <div class="time-post">
                {{$day}}
            </div>
    
            <div class="block-content">
                <h3>
                    <a class="line-clamp line-clamp-2" href="{{$link}}">{{$title}}</a>
                </h3>
                <p class="justify line-clamp line-clamp-3">{{$summary}}
                </p>
                
                <a class="viewmore" href="{{$link}}" title="Đọc tiếp">Đọc tiếp</a>
                
            </div>
    
        </div>
    
    </div>

    {{-- <a href="{{$link}}" class="news-card {{$isRow==true?'isRow':''}}">
        <div class="thumb">
            <img src={{asset($thumb)}} alt="">
            <div class="thumb-layer">
                <img class="thumb-layer-img" src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/favicon.png?1667206835361" alt="">
            </div>
            <div class="date">
                <div>
                    <div class="day">{{$day}}</div>
                    <div class="month">{{$month}}</div>
                </div>
            </div>
        </div>
        <div class="content">
            <h3 class="title">{{$title??null}}</h3>
             <div class="summary">
                {{$summary??null}}
            </div>
        </div>
    </a> --}}



