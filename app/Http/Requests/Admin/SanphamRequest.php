<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SanphamRequest extends FormRequest
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
            'tenSP' => 'required | min:5 | max:255',
            'slug' => 'required | max:255 | alpha_dash | '.
                        Rule::unique('sanpham', 'slug')->ignore($this->route()->id, 'idSP'),
            'giaSP' => 'required | integer | min:1',
            'idLoai' => '',
            'idTH' => '',
            'urlHinh' => 'image|mimes:jpeg,png,jpg|max:2048',
            'moTa' => '',
            'anHien' => 'required | boolean',
            'noiBat' => 'required | boolean',
        ];
    }

    public function messages()
    {
        return [
            'tenSP.required' => 'Bạn chưa nhập tên sản phẩm',
            'tenSP.min' => 'Tên sản phẩm phải dài hơn :min ký tự',
            'tenSP.max' => 'Tên sản phẩm phải ngắn hơn :max ký tự',
            'slug.required' => 'Bạn chưa nhập slug của sản phẩm ',
            'slug.alpha_dash' => 'Slug không đúng định dạng. Ví dụ: slug-dung-dinh-dang',
            'slug.unique' => 'Slug của sản phẩm đã tồn tại',
            'slug.max' => 'Slug của sản phẩm tối đa :max kí tự',
            'giaSP.required' => 'Bạn chưa nhập giá sản phẩm',
            'giaSP.min' => 'Giá sản phẩm tối thiểu :min',
            'giaSP.integer' => 'Giá sản phẩm phải dạng số',
            'urlHinh.image' => 'File tải lên phải là hình ảnh',
            'urlHinh.mimes' => 'File tải lên phải có đuôi là jpeg, png, jpg',
            'urlHinh.max' => 'File tải lên không vượt quá :max kb',
        ];
    }
}
