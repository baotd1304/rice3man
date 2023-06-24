@extends('admin.appLayout.index')
@section('css')
<link rel="stylesheet" href="{{asset('css/admin/product.css')}}">
<style>
    #cvas1 {
        width: 100%;
        aspect-ratio: 1/1;
        position: relative;
    }

    #cvas1 #iconUpload {
        width: 100%;
        position: absolute;
        height: 100%;
        top: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    #imagePreviewUpload {
        width: 100%;
        position: absolute;
        height: 100%;
        top: 0;
        left: 0;
    }

    #cvas1 #iconUpload.active {
        display: flex;
    }

    #cvas1 #iconUpload i {
        z-index: 1000;
        font-size: 40px;
        font-weight: 900;
    }

    #cvas1 img {
        width: 100%;
        position: absolute;
        height: 100%;
        top: 0;
        left: 0;
    }
</style>
@endsection
@section('content')
<?php
use Illuminate\Support\Facades\DB;
?>
<div class="adproduct">
    <form action="/admin/news/capnhat/{{$t->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8 col-sm-6  ">
                <div class="boxlist1">
                    <div class="addpro">
                        <div class="adpro1">
                            <p>Tiêu đề <span>(*)</span></p>
                            <input type="text" placeholder="Nhập tên tiêu đề" name="title" value="{{$t->title}}">
                        </div>
                    </div>
                    <div class="addpro">
                        <div class="adpro1">
                            <p>Thể loại <span>(*)</span></p>
                            <select name="category_news_id">
                                <option value="">Chọn thể loại</option>
                                <?php
                                    $categories = DB::table('categories_news')->get();
                                    foreach($categories as $cate){
                                        if($cate->id == $t->category_news_id){
                                            echo "<option value='$cate->id' selected>$cate->name</option>";
                                        }else{
                                            echo "<option value='$cate->id'>$cate->name</option>";
                                        }
                                    }
                                    ?>
                            </select>
                        </div>
                    </div>
                    <div class="addpro">
                        <div class="adpro1">
                            <p>Tóm tắt <span>(*)</span></p>
                            <textarea name="summary" id="" style="width:100%" cols="100" rows="5" name="summary">
                                                </textarea>
                        </div>
                    </div>
                    <div class="addpro">
                        <div class="adpro1">
                            <p>Nội dung bài viết <span>(*)</span></p>
                            <textarea id="editor1" style="width:100%" name="content"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <script src="https://www.dukelearntoprogram.com/course1/common/js/image/SimpleImage.js">
                </script>
                <div class="addpro">
                    <div class="adpro1">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <strong>Ảnh<span>(*)</span></strong>
                            @if ($t->thumb!=null)
                            <button class="btn btn-sm btn-light " id="btn-replaceImage">Thay thế</button>
                            @endif
                        </div>
                        <div id="cvas1">
                            @if ($t->thumb==null)
                            <div id="iconUpload">
                                <i class="bi bi-upload"></i>
                            </div>
                            @endif
                            <img src="{{asset('upload/'.$t->thumb)}}" alt=""
                                onerror="this.src='{{asset('upload/error.jpg')}}'">
                            <canvas id="imagePreviewUpload"></canvas>
                        </div>
                        <br>
                        <input name="thumb" hidden value="{{asset('upload/')}}" type="file" id="image" multiple="false"
                            accept="{{asset('upload/news.jpg')}}" onchange="uploadIm()" /><br>
                        <script>
                            var img = {{$t->thumb}};
                            const input = document.querySelector("input[type=file]");
                            input.value = img;
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-success mt-4" type="submit">Cập nhật</button>
</div>
</form>
</div>
<script>
    window.CP.PenTimer.MAX_TIME_IN_LOOP_WO_EXIT = 6000;
    var drawGray = null;
    function uploadIm(){
        var canvas = document.getElementById("imagePreviewUpload");
        var image = document.getElementById("image");
        var draw = new SimpleImage(image);
        drawGray = new SimpleImage(image);
        $("#iconUpload").hide(100)
        draw.drawTo(canvas);
    }
</script>
<script>
    var editor = CKEDITOR.replace( 'editor1' );

// The "change" event is fired whenever a change is made in the editor.
    editor.on( 'change', function( evt ) {
        $('#hiddedn input').val(evt.editor.getData());
    });
    $("#btn-replaceImage").click(function (e) { 
        e.preventDefault();
        $("#image").click()
    });
    $("#iconUpload").click(function (e) { 
        e.preventDefault();
        $("#image").click()
    });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

@endsection