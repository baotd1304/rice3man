@extends('client.appLayout.index')

@section('main-content')
<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Quên mật khẩu? Đừng lo lắng. Chỉ cần cho chúng tôi biết email/số điện thoại và chúng tôi sẽ gửi email cho bạn liên kết đặt lại mật khẩu cho phép bạn chọn một mật khẩu mới.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email or Phone -->
        <div>
            <x-input-label for="input_type" :value="__('Email/Số điện thoại')" />
            <x-text-input id="input_type" class="block mt-1 w-full" type="text" name="input_type" :value="old('input_type')" autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Gửi liên kết đặt lại mật khẩu') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
@endsection