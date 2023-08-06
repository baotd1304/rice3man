<?php

// namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use App\Models\NguoiDung;
// class NguoiDungController extends Controller
// {
//     //
//     public function index()
//     {
//         $nguoiDung = NguoiDung::all();

//         return view('admin.nguoidung.index', compact('nguoiDung'));
//     }
   
    
//         public function create()
//         {
//             return view('admin.nguoidung.create');
//         }
    
//         public function store(Request $request)
//         {
//             $validatedData = $request->validate([
//                 'ten' => 'required',
//                 'matKhau' => 'required',
//                 'email' => 'required|email',
//                 'sdt' => 'required',
//                 'diaChi' => 'required',
//                 'hinh' => 'required',
//                 'vaiTro' => 'required',
//                 'hoatDong' => 'required',
//             ]);
    
//             $nguoiDung = NguoiDung::create($validatedData);
    
//             return redirect()->route('nguoidung.index')->with('success', 'Người dùng đã được tạo thành công!');
//         }
    
//     public function edit($id)
//     {
//         $nguoiDung = NguoiDung::findOrFail($id);

//         return view('admin.nguoidung.edit', compact('nguoiDung'));
//     }

//     public function update(Request $request, $id)
//     {
//         $validatedData = $request->validate([
//             'ten' => 'required',
//             'email' => 'required|email',
//             'sdt' => 'required',
//             'diaChi' => 'required',
//         ]);

//         $nguoiDung = NguoiDung::findOrFail($id);
//         $nguoiDung->update($validatedData);

//         return redirect()->route('nguoidung.index')->with('success', 'Thông tin người dùng đã được cập nhật thành công.');
//     }

//     public function destroy($id)
//     {
//         $nguoiDung = NguoiDung::findOrFail($id);
//         $nguoiDung->delete();

//         return redirect()->route('nguoidung.index')->with('success', 'Người dùng đã được xóa thành công.');
//     }
// }



