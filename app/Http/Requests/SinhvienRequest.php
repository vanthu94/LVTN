<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SinhvienRequest extends Request
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
            'MSSV'  =>  'required',
            'txtHoten' =>  'required',
            'txtNganh'   =>  'required'
        ];
    }

    public function messages () 
    {
        return [
            'MSSV.required'     =>  'Vui lòng nhập MSSV',
            'txtHoten.required'    =>  'Vui lòng nhập tên Sinh viên',
            'txtNganh.required'   =>  'Vui lòng nhập ngành học'
        ];
    }
}
