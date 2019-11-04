<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileValidate extends FormRequest
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
            'name' => 'required|min:3|max:30',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'name.min' => 'Tên người dùng có tối thiểu 3 kí tự',
            'name.max' => 'Tên người dùng có tối đa 30 kí tự',
            'avatar.image' => 'Ảnh đại diện phải là một ảnh',
            'avatar.mimes' => 'Ảnh đại diện phải là :jpeg,png,jpg,gif,svg',

        ];
    }
}
