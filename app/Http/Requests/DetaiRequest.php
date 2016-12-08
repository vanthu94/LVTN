<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;

class DetaiRequest extends Request
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
            'txtTendt'  =>  'required',
            'txtYeucau' =>  'required',
            'txtNoidung'   =>  'required'
        ];
    }

    public function messages () 
    {
        return [
            'txtTendt.required'     =>  'Vui lòng nhập tên đề tài',
            'txtYeucau.required'    =>  'Vui lòng nhập yêu cầu',
            'txtNoidung.required'   =>  'Vui lòng nhập nội dung đề tài'
        ];
    }
}
