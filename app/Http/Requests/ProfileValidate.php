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
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|min:3',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'name.min' => 'Tên phải có ít nhất 3 ký tự',
            'avatar.image' => 'Hình đại diện phải là một hình ảnh.',
            'avatar.mimes' => 'Ảnh đại diện phải là một tệp loại: jpeg, png, jpg, gif, svg.',

        ];
    }
}
