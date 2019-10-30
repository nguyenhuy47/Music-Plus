<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormUploadRequest extends FormRequest
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
            'song_file' => 'required|file|max:128000',
            'image_file' => 'required|file|max:3000',
            'singer_ids' => 'required',
            'artist_ids' => 'required',
            'category_id' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên bài hát',
            'song_file.required' => 'Bạn chưa chọn bài hát',
            'song_file.max' => 'File qua lớn, kích thước tối đa là 128 MB',
            'image_file.required' => 'Bạn chưa chọn ảnh',
            'image_file.max' => 'File qua lớn, kích thước tối đa là 3 MB',
            'singer_ids.required' => 'Bạn chưa chọn ca sỹ',
            'artist_ids.required' => 'Bạn chưa chọn nhạc sỹ',
        ];
    }
}
