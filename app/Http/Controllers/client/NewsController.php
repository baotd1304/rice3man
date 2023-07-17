<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\BaiViet;
use App\Models\BinhLuan;
use App\Models\category_news;
use App\Models\comment;
use App\Models\news;
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
    public function newsDetail($id)
    {
       try {
        $post = BaiViet::where('idBV', $id)->firstOrFail();
        $newsRelate=BaiViet::where('idBV','<>',$post->idBV)->paginate(4);
        $comments=BinhLuan::where('idBV',$post->idBV)->get();
        $data=[
            "post"=>$post,
            "newsRelate"=>$newsRelate,
            "comments"=>$comments
        ];
        return view('client.newsDetail.index',$data);
       } catch (\Throwable $th) {
         dd($th);
       }

    }
    public function comment(CommentRequest $request)
    {
       $comment=new comment();
       $comment->content=$request->content;
       $comment->news_id=$request->news_id;
       $comment->user_id=$request->user_id;
       $comment->save();
       return redirect()->back();
    }
}
