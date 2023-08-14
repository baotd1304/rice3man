<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ThuonghieuspRequest extends FormRequest
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
            'tenTH' => 'required|min:3|max:100',
            'slug' => 'required | max:255 | alpha_dash | unique:thuonghieusp',
            'thuTu' => 'required|integer',
            'anHien' => 'required|boolean',
            'urlHinhTH' => 'image | mimes:jpeg,png,jpg | max:2048',
        ];
    }

    public function messages()
    {
        return [
            'tenTH.required' => 'Bạn chưa nhập tên thương hiệu sản phẩm',
            'tenTH.min' => 'Tên thương hiệu sản phẩm tối thiểu :min ký tự',
            'tenTH.max' => 'Tên thương hiệu sản phẩm tối đa :max ký tự',
            'slug.required' => 'Bạn chưa nhập slug của thương hiệu sản phẩm ',
            'slug.alpha_dash' => 'Slug không đúng định dạng. Ví dụ: slug-dung-dinh-dang',
            'slug.unique' => 'Slug của thương hiệu sản phẩm đã tồn tại',
            'slug.max' => 'Slug của thương hiệu sản phẩm tối đa :max kí tự',
            'thuTu.required' => 'Bạn chưa nhập thứ tự thương hiệu sản phẩm',
            'thuTu.integer' => 'Thứ tự phải là dạng số',
            'anHien.required' => 'Bạn chưa chọn dạng ẩn hiện',
            'urlHinhTH.image' => 'File tải lên phải là hình ảnh',
            'urlHinhTH.mimes' => 'File tải lên phải có đuôi là jpeg, png, jpg',
            'urlHinhTH.max' => 'File tải lên không vượt quá :max kb',
        ];
    }
}
