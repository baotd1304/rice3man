<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'phone' => ['numeric', 'max_digits:20', Rule::unique(User::class)->ignore($this->user()->id)],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'address' => ['max:255'],
            'avatar' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'phone.unique' => 'Số điện thoại đã được sử dụng',
            'email.unique' => 'Email đã được sử dụng',
            'avatar.image' => 'File tải lên phải là hình ảnh',
            'avatar.mimes' => 'File tải lên phải có đuôi là jpeg, png, jpg',
            'avatar.max' => 'File tải lên không vượt quá 2048 kb',
        ];
    }
}
