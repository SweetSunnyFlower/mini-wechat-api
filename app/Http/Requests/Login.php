<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Login extends FormRequest
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
            'type' => 'required|in:wechat,mini-wechat,password',
            'code' => 'required_if:wechat,mini-wechat'
        ];
    }

    public function messages()
    {
        return [
            'type.required' => '请输入登录类型',
            'type.in' => '登录类型错误',
            'code.required_if' => '请输入code'
        ];
    }
}
