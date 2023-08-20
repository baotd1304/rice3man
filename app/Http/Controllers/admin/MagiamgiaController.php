<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MagiamgiaRequest;
use App\Models\MaGiamGia;
use Illuminate\Http\Request;

class MagiamgiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = 50;
        $listmgg = MaGiamGia::orderBy('idMGG', 'DESC')->paginate($perPage);
        return view('admin.magiamgia.index', compact('listmgg'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.magiamgia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MagiamgiaRequest $request)
    {
        $validatedData = $request->validate([
            'maGiamGia' => '',
            'chiTiet' => '',
            'loaiMa' => '',
            'giaTri' => '',
            'dieuKien' => '',
            'luotSuDung' => '',
            'gioiHan' => '',
            'ngayBatDau' => '',
            'ngayKetThuc' => '',
            'hoatDong' => '',
        ]);
        MaGiamGia::create($validatedData);
        return redirect()->route('magiamgia.index')
            ->with('success', 'Tạo mã giảm giá thành công.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idMGG)
    {
        $mgg = MaGiamGia::findOrFail($idMGG);
        return view('admin.magiamgia.edit', compact('mgg'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MagiamgiaRequest $request, $idMGG)
    {
        $mgg = MaGiamGia::where('idMGG', $idMGG);
        if ($mgg==null) {
            $request->session()->flash('thongbao', "Thông tin liên hệ ".$idMGG. " không tồn tại");
            redirect("/thongbao");
        }
        $validatedData = $request->validate([
            'maGiamGia' => '',
            'chiTiet' => '',
            'loaiMa' => '',
            'giaTri' => '',
            'dieuKien' => '',
            'luotSuDung' => '',
            'gioiHan' => '',
            'ngayBatDau' => '',
            'ngayKetThuc' => '',
            'hoatDong' => '',
        ]);
        MaGiamGia::where('idMGG', $idMGG)->update($validatedData);
        return redirect()->route('magiamgia.index')
            ->with('success', 'Cập nhật mã giảm giá thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idMGG)
    {
        MaGiamGia::findOrFail($idMGG)->delete();

        return redirect()->route('magiamgia.index')
            ->with('success', 'Xoá mã giảm giá thành công.');
    }
}
