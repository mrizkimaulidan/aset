<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'role_id' => 'required',
            'unique_user_number' => 'required|min:3|max:191',
            'name' => 'required|min:3|max:191',
            'email' => 'required|email|min:3|max:191',
            'gender' => 'required',
            'phone_number' => 'required|min:3|max:191',
            'photo' => 'required',
            'password' => 'required|min:3|max:191'
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
            'role_id.required' => 'Kolom jabatan wajib diisi!',

            'unique_user_number.required' => 'Kolom id pengguna wajib diisi!',
            'unique_user_number.min' => 'Kolom id pengguna minimal :min karakter!',
            'unique_user_number.max' => 'Kolom id pengguna maksimal :max karakter!',

            'name.required' => 'Kolom nama lengkap wajib diisi!',
            'name.min' => 'Kolom nama lengkap minimal :min karakter!',
            'name.max' => 'Kolom nama lengkap maksimal :max karakter!',

            'email.required' => 'Kolom email wajib diisi!',
            'email.email' => 'Kolom email harus email yang valid!',
            'email.min' => 'Kolom email minimal :min karakter!',
            'email.max' => 'Kolom email maksimal :max karakter!',

            'gender.required' => 'Kolom jenis kelamin wajib diisi!',

            'phone_number.required' => 'Kolom nomor telepon wajib diisi!',
            'phone_number.min' => 'Kolom nomor telepon minimal :min karakter!',
            'phone_number.max' => 'Kolom nomor telepon maksimal :max karakter!',

            'photo.required' => 'Kolom foto wajib diisi!',

            'password.required' => 'Kolom password wajib diisi!',
            'password.min' => 'Kolom password minimal :min karakter!',
            'password.max' => 'Kolom password maksimal :max karakter!'
        ];
    }
}
