<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BaivietRequest extends FormRequest
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
            'tieuDe' => 'required | min:5 | max:255',
            'slug' => 'required | max:255 | alpha_dash | unique:baiviet',
            'noiDung' => 'required | min:5',
            'tacGia'=> 'max:50',
            'anHien' => 'required|boolean',
            'noiBat' => 'required|boolean',
            'thumbNail' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'tieuDe.required' => 'Bạn chưa nhập tiêu đề bài viết',
            'tieuDe.min' => 'Tiêu đề bài viết tối thiểu :min ký tự',
            'tieuDe.max' => 'Tiêu đề bài viết tối đa :max ký tự',
            'slug.required' => 'Bạn chưa nhập slug của loại sản phẩm ',
            'slug.alpha_dash' => 'Slug không đúng định dạng. Ví dụ: slug-dung-dinh-dang',
            'slug.unique' => 'Slug của loại sản phẩm đã tồn tại',
            'slug.max' => 'Slug của loại sản phẩm tối đa :max kí tự',
            'noiDung.required' => 'Bạn chưa nhập nội dung bài viết',
            'noiDung.min' => 'Nội dung bài viết tối thiểu :min ký tự',
            'tacGia.max' => 'Tên tác giả tối đa :max ký tự',
            'thumbNail.image' => 'File tải lên phải là hình ảnh',
            'thumbNail.mimes' => 'File tải lên phải có đuôi là jpeg, png, jpg',
            'thumbNail.max' => 'File tải lên không vượt quá :max kb',
        ];
    }

}
