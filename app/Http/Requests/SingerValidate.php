<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SingerValidate extends FormRequest
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
            'name' => 'required',
            'dob' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên ca sỹ',
            'dob.required' => 'Bạn chưa chọn ngày sinh của ca sỹ',
        ];
    }
}
