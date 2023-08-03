<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
            'password_confirmation' => ['required']
        ],[
            'current_password.required' => 'Nhập mật khẩu hiện tại',
            'password.required' => 'Bạn chưa nhập mật khẩu mới',
            'password.min' => 'Mật khẩu mới phải ít nhất 6 ký tự',
            'password.confirmed' => 'Xác nhận mật khẩu không đúng',
            'password_confirmation.required' => 'Bạn chưa nhập xác nhận mật khẩu',
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password-updated')
                    ->with('success', 'Cập nhật mật khẩu thành công!');
    }
}
