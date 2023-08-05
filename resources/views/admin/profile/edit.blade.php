@extends('templates.admin.master')
<style>
    .bg-gray-100{
        --tw-bg-opacity: 0;
        background-color: white;
    }
</style>
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tài khoản</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.profile.edit') }}">Thông tin tài khoản</a></li>
        </ol>
        </nav>
    </div><!-- End Page Title -->
    <x-app-layout>
        {{-- <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="">
            <div class="max-w-7xl mx-auto sm:px-8 lg:px-12 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            {{ $message }}
                        </div>
                    @endif
                    <!-- Default Tabs -->
                    <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
                        <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100 active text-lg font-medium text-gray-900 dark:text-gray-100" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-justified" type="button" role="tab" aria-controls="home" aria-selected="true">Thông tin tài khoản</button>
                        </li>
                        <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100 text-lg font-medium text-gray-900 dark:text-gray-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-justified" type="button" role="tab" aria-controls="profile" aria-selected="false">Cập nhật mật khẩu</button>
                        </li>
                        <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100 text-lg font-medium text-gray-900 dark:text-gray-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-justified" type="button" role="tab" aria-controls="contact" aria-selected="false">Xóa tài khoản</button>
                        </li>
                    </ul>
                    <div class="tab-content pt-2" id="myTabjustifiedContent">
                        <div class="tab-pane fade show active" id="home-justified" role="tabpanel" aria-labelledby="home-tab">
                            <div class="max-w-xl m-auto">
                                @include('admin.profile.partials.update-profile-information-form')
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile-justified" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="max-w-xl m-auto">
                                @include('admin.profile.partials.update-password-form')
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact-justified" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="max-w-xl m-auto">
                                @include('admin.profile.partials.delete-user-form')
                            </div>
                        </div>
                    </div><!-- End Default Tabs -->

                </div>
            
            </div>
        </div>

    </x-app-layout>
</main>
@endsection