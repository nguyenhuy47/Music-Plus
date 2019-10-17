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
            'image_file' => 'required|file|max:30000',
            'singer_name' => 'required',
            'artist_name' => 'required',
            'category_id' => 'required',
        ];
    }
}
