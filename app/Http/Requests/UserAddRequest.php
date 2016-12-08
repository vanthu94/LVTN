<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserAddRequest extends Request
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
            'txtUser'   => 'required|unique:ql64_users,username',
            'txtPass'   => 'required',
            'txtRepass' => 'required|same:txtPass'
        ];
    }

    public function messages () 
    {
        return [
            'txtUser.required'  => 'Vui lòng nhập Username',
            'txtUser.unique'    => 'Username này đã tồn tại',
            'txtPass.required'  => 'Vui lòng nhập Password',
            'txtRepass.required'=> 'Vui lòng nhập Repassword',
            'txtRepass.same'    => 'Hai mật khẩu không trùng nhau'
        ];
    }
}
