@extends('client.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/client/search.css')}}">
@endsection
@section('main-content')
<section class="bread-crumb"
    style="background: linear-gradient(0deg, rgba(0,0,0,0.8), rgba(0,0,0,0.3)),  url(//bizweb.dktcdn.net/100/485/131/themes/906771/assets/breadcrumb.jpg?1686556941849) no-repeat center;">

    <div class="container">
        <div class="title-bread-crumb">
            Tên sản phẩm: {{$q}} - Tìm kiếm
        </div>
        <nav aria-label="breadcrumb  ">
            <ol class=" breadcrumb p-3" @style("margin:0;padding-left:0px")>
                <li class="breadcrumb-item"><a href="{{route('client')}}">Trang trủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tìm kiếm</li>
            </ol>
        </nav>
    </div>
</section>
<div class="container search-page mt-4">
  @if (count($products)<0)
      <span>Không tìm thấy sản phẩm nào cho kết quả tìm kiếm trên</span>     
  @else
     <h4>Có <strong>{{count($products)}} </strong> kết quả tìm kiếm phù hợp </h4>
      
  @endif
  <div class="row mt-4">
    @foreach ($products as $item)
    @php
    $price1="";
    $price2=number_format($item->giaSP,0,",",".");
    if($item->discount>0){
    $price1=number_format($item->giaSP,0,",",".")."vnđ";
    $price2=number_format($item->giaSP-($item->giaSP*$item->discount/100),0,",",".");
    }
    @endphp
    <div class="col-3 mb-3">
      <x-ProductCard link="{{route('clientproduct-detail', $item->slug)}}" name="{{$item->tenSP}}"
        thumb="{{$item->urlHinh}}" priceOld="{{$price1}}" priceCurrent="{{$price2}}đ" discount="{{$item->discount}}" />
    </div>

    @endforeach
  </div>
</div>
@endsection