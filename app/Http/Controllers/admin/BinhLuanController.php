<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BinhLuan;
use App\Models\SanPham;
use Illuminate\Http\Request;

class BinhLuanController extends Controller
{
    public function index($idSP)
    {
        $binhLuans = BinhLuan::where('idSP', $idSP)->get();
        $sanPham = SanPham::findOrFail($idSP);
        return view('admin.binhluan.index', compact('binhLuans', 'sanPham'));
    }

    public function create($idSP)
{
    $sanPham = SanPham::findOrFail($idSP);
    return view('admin.binhluan.create', compact('sanPham'));
}


    public function store(Request $request, $idSP)
    {
        $validatedData = $request->validate([
            'noiDung' => 'required',
            // Thêm các quy tắc validation khác nếu cần
        ]);

        $validatedData['idSP'] = $idSP;
        $binhLuan = BinhLuan::create($validatedData);

        return redirect()->route('binhluan.index', $idSP)->with('success', 'Bình luận đã được tạo thành công.');
    }

    public function edit($idBL)
    {
        $binhLuan = BinhLuan::findOrFail($idBL);
        return view('admin.binhluan.edit', compact('binhLuan'));
    }

    public function update(Request $request, $idBL)
    {
        $validatedData = $request->validate([
            'noiDung' => 'required',
            'sanPham' => 'required',
            'binhLuan' => 'required',
            // Thêm các quy tắc validation khác nếu cần
        ]);

        $binhLuan = BinhLuan::findOrFail($idBL);
        $binhLuan->update($validatedData);

        return redirect()->route('binhluan.index', $binhLuan->idSP)->with('success', 'Bình luận đã được cập nhật thành công.');
    }

    public function destroy($idBL)
    {
        $binhLuan = BinhLuan::findOrFail($idBL);
        $idSP = $binhLuan->idSP;
        $binhLuan->delete();

        return redirect()->route('binhluan.index', $idSP)->with('success', 'Bình luận đã được xóa thành công.');
    }
}
