@extends('client.appLayout.index')

@section('main-content')
<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email or Username -->
        <div>
            <x-input-label for="input_type" :value="__('Email')" />
            <x-text-input id="input_type" class="block mt-1 w-full" type="text" name="input_type" :value="old('input_type', $request->email)" autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mật khẩu')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Xác nhận mật khẩu')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Đặt lại mật khẩu') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

@endsection