<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommodityCategoryRequest extends FormRequest
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
            'name_edit' => 'required|min:3|max:191',
            'description_edit' => 'required|min:3|max:191'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name_edit.required' => 'Kolom nama wajib diisi!',
            'name_edit.min' => 'Kolom nama minimal :min karakter!',
            'name_edit.max' => 'Kolom nama maksimal :max karakter!',

            'description_edit.required' => 'Kolom deskripsi wajib diisi!',
            'description_edit.min' => 'Kolom deskripsi minimal :min karakter!',
            'description_edit.max' => 'Kolom deskripsi maksimal :max karakter!'
        ];
    }
}
