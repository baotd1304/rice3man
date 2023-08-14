<?php

namespace App\Http\Requests\Admin;

use App\Models\LoaiSP;
use Illuminate\Foundation\Http\FormRequest;

class LoaispRequest extends FormRequest
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
            'tenLoai' => 'required|min:5|max:100',
            'slug' => 'required | max:255 | alpha_dash | unique:loaisanpham',
            'thuTu' => 'required|integer',
            'anHien' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'tenLoai.required' => 'Bạn chưa nhập tên loại sản phẩm',
            'tenLoai.min' => 'Tên loại sản phẩm tối thiểu :min ký tự',
            'tenLoai.max' => 'Tên loại sản phẩm tối đa :max ký tự',
            'slug.required' => 'Bạn chưa nhập slug của loại sản phẩm ',
            'slug.alpha_dash' => 'Slug không đúng định dạng. Ví dụ: slug-dung-dinh-dang',
            'slug.unique' => 'Slug của loại sản phẩm đã tồn tại',
            'slug.max' => 'Slug của loại sản phẩm tối đa :max kí tự',
            'thuTu.required' => 'Bạn chưa nhập thứ tự loại sản phẩm',
            'thuTu.ỉnteger' => 'Thứ tự phải là dạng số',
            'anHien.required' => 'Bạn chưa chọn dạng ẩn hiện',
        ];
    }
}
