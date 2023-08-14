<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ThuonghieuspRequest;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();
use App\Models\ThuongHieuSP;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class ThuonghieuSPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = 50;
        $listTH = ThuongHieuSP::orderBy('idTH', 'DESC')->paginate($perPage);
        return view('admin.thuonghieusp.index', compact('listTH'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.thuonghieusp.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ThuonghieuspRequest $request)
    {
        $validatedData = $request->validate([
            'tenTH' => '',
            'slug' => '',
            'thuTu' => '',
            'anHien' => '',
            'urlHinhTH' => '',
        ]);
        if ($request->has('urlHinhTH')) {
            $fileName = (date('Y-m-d',time())).'_'.time().'_'.$request->file('urlHinhTH')->getClientOriginalName();
            $path = $request->file('urlHinhTH')->move('upload/images/thuonghieuSP', $fileName);
            $validatedData["urlHinhTH"] = '/'.$path;
        }
        ThuongHieuSP::create($validatedData);
        return redirect()->route('thuonghieusp.index')
            ->with('success', 'Tạo thương hiệu sản phẩm thành công.');
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
    public function edit($id)
    {
        $thuonghieusp = ThuongHieuSP::findOrFail($id);
        return view('admin.thuonghieusp.edit', compact('thuonghieusp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ThuonghieuspRequest $request, $id)
    {
        $th = ThuongHieuSP::find($id);
        if ($th==null) {
            $request->session()->flash('thongbao', "Thương hiệu sản phẩm $id không tồn tại");
            redirect("/thongbao");
        }
        $validatedData = $request->validate([
            'tenTH' => '',
            'slug' => '',
            'thuTu' => '',
            'anHien' => '',
            'urlHinhTH' => '',
        ]);
        if ($request->has('urlHinhTH')) {
            $fileName = (date('Y-m-d',time())).'_'.time().'_'.$request->file('urlHinhTH')->getClientOriginalName();
            $path = $request->file('urlHinhTH')->move('upload/images/thuonghieuSP', $fileName);
            $validatedData["urlHinhTH"] = '/'.$path;
        }
        ThuongHieuSP::where('idTH', $id)->update($validatedData);
        return redirect()->route('thuonghieusp.index')
            ->with('success', 'Cập nhật thương hiệu sản phẩm thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ThuongHieuSP::findOrFail($id)->delete();

        return redirect()->route('thuonghieusp.index')
            ->with('success', 'Xoá thương hiệu sản phẩm thành công.');
    }

    public function getSlug(Request $request)
    {
        $slug = SlugService::createSlug(ThuongHieuSP::class, 'slug', $request->tenTH);
        return response()->json(['slug' => $slug]);
    }

}
