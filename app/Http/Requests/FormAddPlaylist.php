<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormAddPlaylist extends FormRequest
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
            'songIds' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'songIds.required' => 'Bạn chưa chọn bài hát nào',
        ];
    }
}
