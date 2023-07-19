<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BaiViet;

class BaivietController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = 50;
        $listbv = BaiViet::orderBy('idBV', 'DESC')->paginate($perPage);
        return view('admin.baiviet.index', compact('listbv'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.baiviet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData =$request->validate([
            'tieuDe' => 'required | min:5 | max:255',
            'noiDung' => 'required | min:5',
            'tacGia'=> '',
            'anHien' => 'required|boolean',
            'noiBat' => 'required|boolean',
            'thumbNail' => 'image|mimes:jpeg,png,jpg|max:2048',
        ],[
            'tieuDe.required' => 'Bạn chưa nhập tiêu đề bài viết',
            'tieuDe.min' => 'Tiêu đề bài viết phải dài hơn 5 ký tự',
            'tieuDe.max' => 'Tiêu đề bài viết phải ngắn hơn 255 ký tự',
            'noiDung.required' => 'Bạn chưa nhập nội dung bài viết',
            'noiDung.min' => 'Nội dung bài viết phải dài hơn 5 ký tự',
            'thumbNail.image' => 'File tải lên phải là hình ảnh',
            'thumbNail.mimes' => 'File tải lên phải có đuôi là jpeg, png, jpg',
            'thumbNail.max' => 'File tải lên không vượt quá 2048 kb',
        ]);
        if ($request->has('thumbNail')) {
            $fileName = (date('Y-m-d',time())).'_'.time().'_'.$request->file('thumbNail')->getClientOriginalName();
            $path = $request->file('thumbNail')->move('upload/images/baiviet', $fileName);
            $validatedData["thumbNail"] = '/'.$path;
        }
        BaiViet::create($validatedData);
        return redirect()->route('baiviet.index')->with('success', 'Thêm bài viết thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $idBV)
    {
        $baiviet = BaiViet::find($idBV);
        if ($baiviet==null) {
            $request->session()->flash('thongbao', "Bài viết $idBV không có");
            return redirect("/thongbao");
        }
        return view("admin.baiviet.edit", compact('baiviet') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $idBV)
    {
        $bv = BaiViet::find($idBV);
        if ($bv==null) {
            $request->session()->flash('thongbao', "Bài viết $idBV không tồn tại");
            redirect("/thongbao");
        }

        $validatedData =$request->validate([
            'tieuDe' => 'required | min:5 | max:255',
            'noiDung' => 'required | min:5',
            'tacGia'=> '',
            'anHien' => 'required|boolean',
            'noiBat' => 'required|boolean',
            'thumbNail' => 'image|mimes:jpeg,png,jpg|max:2048',
        ],[
            'tieuDe.required' => 'Bạn chưa nhập tiêu đề bài viết',
            'tieuDe.min' => 'Tiêu đề bài viết phải dài hơn 5 ký tự',
            'tieuDe.max' => 'Tiêu đề bài viết phải ngắn hơn 255 ký tự',
            'noiDung.required' => 'Bạn chưa nhập nội dung bài viết',
            'noiDung.min' => 'Nội dung bài viết phải dài hơn 5 ký tự',
            'thumbNail.image' => 'File tải lên phải là hình ảnh',
            'thumbNail.mimes' => 'File tải lên phải có đuôi là jpeg, png, jpg',
            'thumbNail.max' => 'File tải lên không vượt quá 2048 kb',
        ]);
        if ($request->has('thumbNail')) {
            $fileName = (date('Y-m-d',time())).'_'.time().'_'.$request->file('thumbNail')->getClientOriginalName();
            $path = $request->file('thumbNail')->move('upload/images/baiviet', $fileName);
            $validatedData["thumbNail"] = '/'.$path;
        }
        BaiViet::where('idBV', $idBV)->update($validatedData);

        return redirect()->route('baiviet.index')->with('success', 'Cập nhật bài viết thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idBV)
    {
        BaiViet::findOrFail($idBV)->delete();

        return redirect()->route('baiviet.index')
            ->with('success', 'Xóa bài viết thành công.');
    }
}
