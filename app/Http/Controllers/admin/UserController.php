<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    //
    public function index()
    {
        $user = User::all();

        return view('admin.user.index', compact('user'));
    }
   
    
    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $validatedData =$request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'max_digits:20', 'unique:'.User::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'avatar' => 'image|mimes:jpeg,png,jpg|max:2048',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'password_confirmation' => ['required'],
        ],[
            'name.required' => 'Bạn chưa nhập họ tên',
            'name.max' => 'Họ tên tối đa 255 ký tự',
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'phone.max_digits' => 'Số điện thoại tối đa :max chữ số',
            'phone.numeric' => 'Số điện thoại phải là dạng số',
            'phone.unique' => 'Số điện thoại đã được sử dụng',
            'email.required' => 'Bạn chưa nhập email',
            'email.max' => 'Email tối đa 255 ký tự',
            'email.unique' => 'Email đã được sử dụng',
            'email.email' => 'Vui lòng nhập đúng định dạng email.',
            'avatar.image' => 'File tải lên phải là hình ảnh',
            'avatar.mimes' => 'File tải lên phải có đuôi là jpeg, png, jpg',
            'avatar.max' => 'File tải lên không vượt quá 2048 kb',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu phải ít nhất 6 ký tự',
            'password.confirmed' => 'Xác nhận mật khẩu không đúng',
            'password_confirmation.required' => 'Bạn chưa nhập xác nhận mật khẩu',
        ]);
        if ($request->has('avatar')) {
            $fileName = (date('Y-m-d',time())).'_'.time().'_'.$request->file('avatar')->getClientOriginalName();
            $path = $request->file('avatar')->move('upload/images/profile', $fileName);
            $validatedData["avatar"] = '/'.$path;
        }

        $validatedData["password"] = Hash::make($request->password);
        $user = User::create($validatedData);

        event(new Registered($user));

        return redirect()->route('user.index')->with('success', 'Tài khoản đã được tạo thành công!');
    }
    
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'role' => 'required | boolean',
            'active' => 'required | boolean',
        ]);

        if ($request->has('avatar')) {
            $fileName = (date('Y-m-d',time())).'_'.time().'_'.$request->file('avatar')->getClientOriginalName();
            $path = $request->file('avatar')->move('upload/images/profile', $fileName);
            $validatedData["avatar"] = '/'.$path;
        }
        User::where('id', $id)->update($validatedData);

        return redirect()->route('user.index')->with('success', 'Thông tin tài khoản đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('user.index')->with('success', 'Tài khoản đã được xóa thành công.');
    }
}



