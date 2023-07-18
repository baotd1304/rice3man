<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();
use App\Models\LoaiSP;

class LoaiSPController extends Controller
{
    public function index()
    {
        $perPage = 50;
        $listloaisp = LoaiSP::orderBy('idLoai', 'DESC')->paginate($perPage);
        return view('admin.loaisp.index', compact('listloaisp'));
    }

    public function create()
    {
        return view('admin.loaisp.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tenLoai' => 'required|min:5',
            'thuTu' => 'required|integer',
            'anHien' => 'required|boolean',
        ],[
            'tenLoai.required' => 'Bạn chưa nhập tên loại sản phẩm',
            'tenLoai.min' => 'Tên loại sản phẩm phải dài hơn 5 ký tự',
            'thuTu.required' => 'Bạn chưa nhập thứ tự loại sản phẩm',
            'thuTu.ỉnteger' => 'Thứ tự phải là dạng số',
            'anHien.required' => 'Bạn chưa chọn dạng ẩn hiện',
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

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tenLoai' => 'required|min:5',
            'thuTu' => 'required|integer',
            'anHien' => 'required|boolean',
        ],[
            'tenLoai.required' => 'Bạn chưa nhập tên loại sản phẩm',
            'tenLoai.min' => 'Tên loại sản phẩm phải dài hơn 5 ký tự',
            'thuTu.required' => 'Bạn chưa nhập thứ tự loại sản phẩm',
            'thuTu.ỉnteger' => 'Thứ tự phải là dạng số',
            'anHien.required' => 'Bạn chưa chọn dạng ẩn hiện',
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
}
