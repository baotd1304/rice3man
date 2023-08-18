<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoaispRequest;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();
use App\Models\LoaiSP;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class LoaiSPController extends Controller
{
    public function index()
    {
        $perPage = 10;
        $listloaisp = LoaiSP::orderBy('idLoai', 'DESC')->paginate($perPage);
        return view('admin.loaisp.index', compact('listloaisp'));
    }

    public function create()
    {
        return view('admin.loaisp.create');
    }

    public function store(LoaispRequest $request)
    {
        $validatedData = $request->validate([
            'tenLoai' => '',
            'slug' => '',
            'thuTu' => '',
            'anHien' => '',
        ]);
        
        LoaiSP::create($validatedData);

        return redirect()->route('loaisp.index')
            ->with('success', 'Tạo loại sản phẩm thành công.');
    }

    public function edit($id)
    {
        $loaisp = LoaiSP::findOrFail($id);
        return view('admin.loaisp.edit', compact('loaisp'));
    }

    public function update(LoaispRequest $request, $id)
    {
        $validatedData = $request->validate([
            'tenLoai' => '',
            'slug' => '',
            'thuTu' => '',
            'anHien' => '',
        ]);
        
        LoaiSP::where('idLoai', $id)->update($validatedData);

        return redirect()->route('loaisp.index')
            ->with('success', 'Cập nhật loại sản phẩm thành công.');
    }

    public function destroy($id)
    {
        LoaiSP::findOrFail($id)->delete();

        return redirect()->route('loaisp.index')
            ->with('success', 'Xoá loại sản phẩm thành công.');
    }

    public function getSlug(Request $request)
    {
        $slug = SlugService::createSlug(LoaiSP::class, 'slug', $request->tenLoai);
        return response()->json(['slug' => $slug]);

    }

}
