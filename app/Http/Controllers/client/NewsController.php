<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\BaiViet;
use App\Models\BinhLuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    //
    public function index(Request $request){
       
        $baiViet=BaiViet::paginate(8);
        // dd($news);
        $data=[
            "news"=>$baiViet,
        ];
        return view('client.news.index',$data);
    }
    public function newsDetail($slug)
    {
       try {
        $post = BaiViet::where('slug', $slug)->firstOrFail();
        $newsRelate=BaiViet::where('tacGia','=', $post->tacGia)->paginate(4);
        $data=[
            "post"=>$post,
            "newsRelate"=>$newsRelate,
        ];
        return view('client.newsDetail.index',$data);
        } 
        catch (\Throwable $th) {
            //  dd($th);
        }

    }
    public function binhluan(CommentRequest $request)
    {
       $binhluan=new BinhLuan();
       $binhluan->noiDung=$request->content;
       $binhluan->idSP=$request->idSP;
       $binhluan->idND=$request->idND;
       $binhluan->save();
       return redirect()->back();
    }
}
