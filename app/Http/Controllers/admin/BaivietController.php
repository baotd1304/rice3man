<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BaivietRequest;
use Illuminate\Http\Request;
use App\Models\BaiViet;
use \Cviebrock\EloquentSluggable\Services\SlugService;

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
    public function store(BaivietRequest $request)
    {
        $validatedData =$request->validate([
            'tieuDe' => '',
            'slug' => '',
            'noiDung' => '',
            'tacGia'=> '',
            'anHien' => '',
            'noiBat' => '',
            'thumbNail' => '',
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
    public function update(BaivietRequest $request, $idBV)
    {
        $bv = BaiViet::find($idBV);
        if ($bv==null) {
            $request->session()->flash('thongbao', "Bài viết $idBV không tồn tại");
            redirect("/thongbao");
        }

        $validatedData =$request->validate([
            'tieuDe' => '',
            'slug' => '',
            'noiDung' => '',
            'tacGia'=> '',
            'anHien' => '',
            'noiBat' => '',
            'thumbNail' => '',
        ]);
        if ($request->has('thumbNail')) {
            $fileName = (date('Y-m-d',time())).'_'.time().'_'.$request->file('thumbNail')->getClientOriginalName();
            $path = $request->file('thumbNail')->move('upload/images/baiviet', $fileName);
            $validatedData["thumbNail"] = '/'.$path;
        }
        BaiViet::where('idBV', $idBV)->update($validatedData);

        return redirect()->route('baiviet.index')->with('success', 'Cập nhật bài viết mã ID '.$idBV.' thành công!');
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

    public function getSlug(Request $request)
    {
        $slug = SlugService::createSlug(BaiViet::class, 'slug', $request->tieuDe);
        return response()->json(['slug' => $slug]);
    }

}
