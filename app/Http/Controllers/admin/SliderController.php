<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = 50;
        $listslider = Slider::orderBy('id', 'DESC')->paginate($perPage);
        return view('admin.slider.index', compact('listslider'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData =$request->validate([
            'tenSlider' => 'required | min:5 | max:255',
            'hinhSlider' => 'image|mimes:jpeg,png,jpg|max:2048',
            'anHien' => 'required|boolean',
            'nhom' => 'required|numeric'
        ],[
            'tenSlider.required' => 'Bạn chưa nhập tên slider',
            'tenSlider.min' => 'Tên slider phải dài hơn 5 ký tự',
            'tenSlider.max' => 'Tên slider phải ngắn hơn 255 ký tự',
            'nhom.required' => 'Bạn chưa nhập nhóm cho slider',
            'nhom.numeric' => 'Nhóm slider phải dạng số',
            'hinhSlider.image' => 'File tải lên phải là hình ảnh',
            'hinhSlider.mimes' => 'File tải lên phải có đuôi là jpeg, png, jpg',
            'hinhSlider.max' => 'File tải lên không vượt quá 2048 kb',
        ]);
        if ($request->has('hinhSlider')) {
            $fileName = (date('Y-m-d',time())).'_'.time().'_'.$request->file('hinhSlider')->getClientOriginalName();
            $path = $request->file('hinhSlider')->move('upload/images/slider', $fileName);
            $validatedData["hinhSlider"] = '/'.$path;
        }
        Slider::create($validatedData);
        return redirect()->route('slider.index')->with('success', 'Thêm slider thành công!');
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
    public function edit(Request $request, $id)
    {
        $slider = Slider::find($id);
        if ($slider==null) {
            $request->session()->flash('thongbao', "Slider' .$id.' không có");
            return redirect("/thongbao");
        }
        return view("admin.slider.edit", compact('slider') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
        if ($slider==null) {
            $request->session()->flash('thongbao', "Bài viết '.$id.' không tồn tại");
            redirect("/thongbao");
        }

        $validatedData =$request->validate([
            'tenSlider' => 'required | min:5 | max:255',
            'hinhSlider' => 'image|mimes:jpeg,png,jpg|max:2048',
            'anHien' => 'required|boolean',
            'nhom' => 'required|numeric'
        ],[
            'tenSlider.required' => 'Bạn chưa nhập tên slider',
            'tenSlider.min' => 'Tên slider phải dài hơn 5 ký tự',
            'tenSlider.max' => 'Tên slider phải ngắn hơn 255 ký tự',
            'nhom.required' => 'Bạn chưa nhập nhóm cho slider',
            'nhom.numeric' => 'Nhóm slider phải dạng số',
            'hinhSlider.image' => 'File tải lên phải là hình ảnh',
            'hinhSlider.mimes' => 'File tải lên phải có đuôi là jpeg, png, jpg',
            'hinhSlider.max' => 'File tải lên không vượt quá 2048 kb',
        ]);
        if ($request->has('hinhSlider')) {
            $fileName = (date('Y-m-d',time())).'_'.time().'_'.$request->file('hinhSlider')->getClientOriginalName();
            $path = $request->file('hinhSlider')->move('upload/images/slider', $fileName);
            $validatedData["hinhSlider"] = '/'.$path;
        }
        Slider::where('id', $id)->update($validatedData);

        return redirect()->route('slider.index')->with('success', 'Cập nhật slider '.$id.' thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Slider::findOrFail($id)->delete();

        return redirect()->route('slider.index')
            ->with('success', 'Xóa bài viết thành công.');
    }
}
