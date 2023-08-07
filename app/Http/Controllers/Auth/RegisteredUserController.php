<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'max_digits:20', 'unique:'.User::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'password_confirmation' => ['required'],
        ],[
            'name.required' => 'Bạn chưa nhập họ tên',
            'name.max' => 'Họ tên tối đa 255 ký tự',
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'phone.max_digits' => 'Số điện thoại tối đa :max_digits chữ số',
            'phone.numeric' => 'Số điện thoại phải là dạng số',
            'phone.unique' => 'Số điện thoại đã được sử dụng',
            'email.required' => 'Bạn chưa nhập email',
            'email.max' => 'Email tối đa 255 ký tự',
            'email.unique' => 'Email đã được sử dụng',
            'email.email' => 'Vui lòng nhập đúng định dạng email.',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu phải ít nhất 6 ký tự',
            'password.confirmed' => 'Xác nhận mật khẩu không đúng',
            'password_confirmation.required' => 'Bạn chưa nhập xác nhận mật khẩu',
        ]);

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
