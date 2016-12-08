<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;

class NhomRequest extends Request
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
     * @return array
     */
    public function rules()
    {
        return [
            'txtTennhom'   => 'required',
            'Sosv'   => 'required'
        ];
    }

    public function messages () 
    {
        return [
            'txtTennhom.required' => 'Vui Lòng Nhập Tên Nhóm',
            'Sosv.required'  => 'Vui Lòng Nhập Số Sinh Viên'
        ];
    }
}
