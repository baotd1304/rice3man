<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();
use App\Models\SanPham;
use App\Models\LoaiSP;
use App\Models\ThuongHieuSP;

class SanphamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = 50;
        $listsp = SanPham::join('loaisanpham', 'loaisanpham.idLoai', '=', 'sanpham.idLoai')
                ->join('thuonghieusp', 'thuonghieusp.idTH', '=', 'sanpham.idTH')
                ->select('sanpham.*', 'loaisanpham.tenLoai', 'thuonghieusp.tenTH')
                ->orderBy('idSP', 'DESC')->paginate($perPage);
        return view('admin.sanpham.index', compact('listsp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $loaisp = LoaiSP::all();
        $thuonghieusp = ThuongHieuSP::all();
        return view('admin.sanpham.create', compact('loaisp', 'thuonghieusp'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData =$request->validate([
            'tenSP' => 'required | min:5 | max:255',
            'giaSP' => 'required | integer | min:1',
            'idLoai' => '',
            'idTH' => '',
            'urlHinh' => 'image|mimes:jpeg,png,jpg|max:2048',
            'moTa' => '',
            'anHien' => 'required | boolean',
            'noiBat' => 'required | boolean',
        ],[
            'tenSP.required' => 'Bạn chưa nhập tên sản phẩm',
            'tenSP.min' => 'Tên sản phẩm phải dài hơn 5 ký tự',
            'tenSP.max' => 'Tên sản phẩm phải ngắn hơn 255 ký tự',
            'giaSP.required' => 'Bạn chưa nhập giá sản phẩm',
            'giaSP.min' => 'Giá sản phẩm phải lớn hơn 0',
            'giaSP.integer' => 'Giá sản phẩm phải dạng số',
            'urlHinh.image' => 'File tải lên phải là hình ảnh',
            'urlHinh.mimes' => 'File tải lên phải có đuôi là jpeg, png, jpg',
            'urlHinh.max' => 'File tải lên không vượt quá 2048 kb',
        ]);
        
        if ($request->has('urlHinh')) {
            $fileName = (date('Y-m-d',time())).'_'.time().'_'.$request->file('urlHinh')->getClientOriginalName();
            $path = $request->file('urlHinh')->move('upload/images/sanpham', $fileName);
            $validatedData["urlHinh"] = '/'.$path;
        }
        SanPham::create($validatedData);
        return redirect()->route('sanpham.index')->with('success', 'Thêm sản phẩm thành công!');
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
    public function edit(Request $request, $idSP=0, $idLoai=0, $idTH=0 )
    {
        $loaisp = LoaiSP::all();
        $sanpham = Sanpham::find($idSP);
        $thuonghieusp = ThuongHieuSP::all();
        if ($sanpham==null) {
            $request->session()->flash('thongbao', "Sản phẩm $idSP không có");
            return redirect("/thongbao");
        }
        return view("admin.sanpham.edit", compact('sanpham', 'loaisp', 'thuonghieusp') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $sp = Sanpham::find($id);
        if ($sp==null) {
            $request->session()->flash('thongbao', "Sản phẩm $id không tồn tại");
            redirect("/thongbao");
        }
        $validatedData =$request->validate([
            'tenSP' => 'required | min:5 | max:255',
            'giaSP' => 'required | integer | min:1',
            'idLoai' => '',
            'idTH' => '',
            'urlHinh' => 'image|mimes:jpeg,png,jpg|max:2048',
            'moTa' => '',
            'anHien' => 'required | boolean',
            'noiBat' => 'required | boolean',
        ],[
            'tenSP.required' => 'Bạn chưa nhập tên sản phẩm',
            'tenSP.min' => 'Tên sản phẩm phải dài hơn 5 ký tự',
            'tenSP.max' => 'Tên sản phẩm phải ngắn hơn 255 ký tự',
            'giaSP.required' => 'Bạn chưa nhập giá sản phẩm',
            'giaSP.min' => 'Giá sản phẩm phải lớn hơn 0',
            'giaSP.integer' => 'Giá sản phẩm phải dạng số',
            'urlHinh.image' => 'File tải lên phải là hình ảnh',
            'urlHinh.mimes' => 'File tải lên phải có đuôi là jpeg, png, jpg',
            'urlHinh.max' => 'File tải lên không vượt quá 2048 kb',
        ]);
        
        if ($request->has('urlHinh')) {
            $fileName = (date('Y-m-d',time())).'_'.time().'_'.$request->file('urlHinh')->getClientOriginalName();
            $path = $request->file('urlHinh')->move('upload/images/sanpham', $fileName);
            $validatedData["urlHinh"] = '/'.$path;
        }
        SanPham::where('idSP', $id)->update($validatedData);
        
        return redirect()->route('sanpham.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idSP)
    {
        SanPham::findOrFail($idSP)->delete();

        return redirect()->route('sanpham.index')
            ->with('success', 'Xóa sản phẩm thành công.');
    }
}
