<?php

namespace App\Http\Requests\Admin;

use App\Models\MaGiamGia;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class MagiamgiaRequest extends FormRequest
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
            'maGiamGia' => ['required', 'min:5', 'max: 20', 
                            Rule::unique('magiamgia', 'maGiamGia')->ignore($this->route()->id, 'idMGG'),
                        ],
            'chiTiet' => 'max:255',
            'loaiMa' => '',
            'giaTri' => ['required', 'numeric', Rule::when($this->loaiMa == '1', ['max:100']) ],
            'dieuKien' => ['numeric', 'nullable'],
            'luotSuDung' => ['numeric', 'nullable', Rule::when($this->gioiHan !== '', ['max:'.$this->gioiHan]) ],
            'gioiHan' => 'numeric | nullable',
            'ngayBatDau' => ['nullable'],
            'ngayKetThuc' => ['nullable', Rule::when($this->ngayBatDau !== '', ['after_or_equal:ngayBatDau']) ],  
            'hoatDong' => '',
        ];
    }
    public function messages()
    {
        return [
            'maGiamGia.required' => 'Bạn chưa nhập mã giảm giá',
            'maGiamGia.min' => 'Mã giảm giá tối thiểu :min ký tự',
            'maGiamGia.max' => 'Mã giảm giá tối đa :max ký tự',
            'maGiamGia.unique' => 'Mã giảm giá đã tồn tại',
            'chiTiet.max' => 'Mô tả chi tiết tối đa :max ký tự',
            'giaTri.required' => 'Bạn chưa nhập giá trị',
            'giaTri.numeric' => 'Giá trị mã giảm phải là dạng số',
            'giaTri.max' => 'Giá trị mã giảm tối đa 100%',
            'dieuKien.numeric' => 'Điều kiện áp dụng mã phải là dạng số',
            'luotSuDung.numeric' => 'Lượt sử dụng phải là định dạng số',
            'luotSuDung.max' => 'Lượt đã sử dụng không được vượt quá số lượt giới hạn sử dụng: :max',
            'gioiHan.numeric' => 'Giới hạn lượt sử dụng phải là định dạng số',
            'ngayKetThuc.after_or_equal' => 'Ngày kết thúc áp dụng phải sau ngày bắt đầu',
        ];
    }
}
