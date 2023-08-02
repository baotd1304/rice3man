<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $input_type = filter_var($request->input('input_type'), FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        $request->merge([$input_type => $request->input('input_type')]);

        $request->validate([
            'email' => ['sometimes', 'required', 'string', 'email', 'exists:users,email'],
            'phone' => ['sometimes', 'required', 'numeric', 'exists:users,phone'],
        ],[
            'email.required' => "Bạn chưa nhập email/số điện thoại",
            'phone.required' => "Bạn chưa nhập email/số điện thoại",
            'email.exists' => "Email/số điện thoại không đúng",
            'phone.exists' => "Email/số điện thoại không đúng",
            'email.email' => "Vui lòng nhập email/số điện thoại",
            'phone.numeric' => "Vui lòng nhập email/số điện thoại",
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only($input_type)
        );

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only($input_type))
                            ->withErrors([$input_type => __($status)]);
    }
}