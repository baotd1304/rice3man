<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\LoaiSP;
use Illuminate\Http\Request;

class LoaiSPController extends Controller
{
    public function index()
    {
        $loaiSPs = LoaiSP::all();
        return view('admin.loaisp.index', compact('loaiSPs'));
    }

    public function create()
    {
        return view('admin.loaisp.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tenLoai' => 'required',
            'thuTu' => 'required|integer',
            'anHien' => 'required|boolean',
        ]);

        LoaiSP::create($validatedData);

        return redirect()->route('loaisanpham.index')
            ->with('success', 'Loại sản phẩm đã được tạo thành công.');
            if  ('echo "thất bại"');
    }

    public function edit($id)
    {
        $loaiSP = LoaiSP::findOrFail($id);
        return view('admin.loaisp.edit', compact('loaiSP'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tenLoai' => 'required',
            'thuTu' => 'required|integer',
            'anHien' => 'required|boolean',
        ]);

        LoaiSP::where('idLoai', $id)->update($validatedData);

        return redirect()->route('loaisanpham.index')
            ->with('success', 'Loại sản phẩm đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        LoaiSP::findOrFail($id)->delete();

        return redirect()->route('loaisanpham.index')
            ->with('success', 'Loại sản phẩm đã được xoá thành công.');
    }
}
