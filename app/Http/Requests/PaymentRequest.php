<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'username' => 'required | min:5 | max:255',
            'phone' => 'required | numeric | max_digits:20',
            'email'=>'required | email | max:255',
            'address' => 'required | string| max:255',
            'province'=>'required',
            'district'=>'required',
            'ward'=>'required',
            
        ];
        
    }
    public function messages()
    {
        return [
            'username.required' => 'Bạn chưa nhập họ tên',
            'username.max' => 'Họ tên tối đa :max ký tự',
            'username.min' => 'Họ tên ít nhất :min ký tự',
            'email.required' => 'Bạn chưa nhập email',
            'email.max' => 'Email tối đa :max ký tự',
            'email.email' => 'Vui lòng nhập đúng định dạng email. Vidu@example.com',  
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'phone.max_digits' => 'Số điện thoại tối đa :max chữ số',
            'phone.numeric' => 'Số điện thoại phải là dạng số',
            'address.required' => 'Địa chỉ không được để trống',
            'address.max' => 'Địa chỉ tối đa :max ký tự',
            
            'province.required'=>'Bạn chưa chọn tỉnh/thành phố',
            'district.required'=>'Bạn chưa chọn quận/huyện',
            'ward.required'=>'Bạn chưa chọn phường/xã',
          
        ];
    }
}
