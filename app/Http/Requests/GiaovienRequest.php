<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GiaovienRequest extends Request
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
            'MSGV'  =>  'required',
            'txtHoten' =>  'required',
            'txtHocvi'   =>  'required'
        ];
    }

    public function messages () 
    {
        return [
            'MSGV.required'     =>  'Vui lòng nhập MSGV',
            'txtHoten.required'    =>  'Vui lòng nhập tên Giảng Viên',
            'txtHocvi.required'   =>  'Vui lòng nhập học vị Giảng Viên'
        ];
    }
}
