<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserProfileRequest extends FormRequest
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
            'photo' => 'image',
            'new_password' => 'nullable|min:6|max:191|same:repeat_new_password',
            'repeat_new_password' => 'nullable|min:6|max:191'
        ];
    }

    public function messages()
    {
        return [
            'photo' => 'Kolom foto harus gambar!',

            'new_password.required' => 'Kolom password baru wajib diisi!',
            'new_password.min' => 'Kolom password baru minimal :min karakter!',
            'new_password.max' => 'Kolom password baru maksimal :max karakter!',
            'new_password.same' => 'Kolom ulangi password baru harus sama dengan kolom password baru!',

            'repeat_new_password.required' => 'Kolom ulangi password wajib diisi!',
            'repeat_new_password.min' => 'Kolom ulangi password minimal :min karakter!',
            'repeat_new_password.,ax' => 'Kolom ulangi password maksimal :max karakter!',
        ];
    }
}
