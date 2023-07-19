<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BinhLuan;
use App\Models\NguoiDung;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();

class BinhLuanController extends Controller
{
    public function index()
    {
        $perPage = 50;
        $listbl = BinhLuan::join('sanpham', 'binhluan.idSP', '=', 'sanpham.idSP')
                ->join('nguoidung', 'binhluan.idND', '=', 'nguoidung.idND')
                ->select('binhluan.*', 'sanpham.tenSP as tenSP', 'nguoidung.ten as tenND')
                ->orderBy('idBL', 'DESC')->paginate($perPage);
        
        return view('admin.binhluan.index', compact('listbl'));
    }
    public function edit(Request $request, $idBL=0)
    {
        $binhluan = BinhLuan::join('sanpham', 'binhluan.idSP', '=', 'sanpham.idSP')
                ->join('nguoidung', 'binhluan.idND', '=', 'nguoidung.idND')
                ->select('binhluan.*', 'sanpham.tenSP as tenSP', 'nguoidung.ten as tenND')
                ->find($idBL);
        if ($binhluan==null) {
            $request->session()->flash('thongbao', "Bình luận $idBL không có");
            return redirect("/thongbao");
        }
        return view("admin.binhluan.edit", compact('binhluan') );
    }

    public function update(Request $request, $id)
    {
        $binhluan = BinhLuan::find($id);
        if ($binhluan==null) {
            $request->session()->flash('thongbao', "Bình luận $id không tồn tại");
            redirect("/thongbao");
        }
        $validatedData =$request->validate([
            'anHien' => 'required | boolean',
        ],[
            'anHien.required' => 'Chọn trạng thái hiển thị',
        ]);
        BinhLuan::where('idBL', $id)->update($validatedData);
        return redirect()->route('binhluan.index')->with('success', 'Cập nhật bình luận thành công!');
    }

}
