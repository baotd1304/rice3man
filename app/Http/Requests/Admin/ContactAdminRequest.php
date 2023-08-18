<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ContactAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5|max:255',
            'logo' => 'image | mimes:jpeg,png,jpg | max:2048',
            'email' => 'required|email|max:255',
            'hotline' => 'required | numeric | max_digits:255',
            'address' => 'required | max:255',
            'description' => '',
            'active' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên thông tin liên hệ',
            'name.min' => 'Tên thông tin liên hệ tối thiểu :min ký tự',
            'name.max' => 'Tên thông tin liên hệ tối đa :max ký tự',
            'email.required' => 'Bạn chưa nhập email liên hệ',
            'email.email' => 'Email liên hệ chưa đúng định dạng. Ví dụ: vidu@email.com',
            'email.max' => 'Email liên hệ tối đa :max ký tự',
            'hotline.required' => 'Bạn chưa nhập số điện thoại liên hệ',
            'hotline.integer' => 'Số điện thoại liên hệ phải là dạng số',
            'hotline.max_digits' => 'Số điện thoại liên hệ tối đa :max chữ số',
            'address.required' => 'Bạn chưa nhập địa chỉ liên hệ',
            'address.max' => 'Địa chỉ liên hệ tối đa :max ký tự',
            'active.required' => 'Bạn chưa chọn dạng ẩn hiện',
            'logo.required' => 'Bạn chưa tải lên logo',
            'logo.image' => 'File tải lên phải là hình ảnh',
            'logo.mimes' => 'File tải lên phải có đuôi là jpeg, png, jpg',
            'logo.max' => 'File tải lên không vượt quá :max kb',
        ];
    }

}
