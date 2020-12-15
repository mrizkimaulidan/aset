<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommodityRequest extends FormRequest
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
            'user_id' => 'required',
            'commodity_category_id' => 'required',
            'commodity_location_id' => 'required',
            'unique_commodity_number' => 'required|min:3|max:191',
            'name' => 'required|min:3|max:191',
            'amount' => 'required|min:1|max:191',
            'register_date' => 'required',
            'update_date' => 'required',
            'condition' => 'required'
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
            'user_id.required' => 'Kolom pengguna wajib diisi!',

            'commodity_category_id.required' => 'Kolom jenis aset wajib diisi!',

            'commodity_location_id.required' => 'Kolom ruangan wajib diisi!',

            'unique_commodity_number.required' => 'Kolom id aset wajib diisi!',
            'unique_commodity_number.min' => 'Kolom id aset minimal :min karakter!',
            'unique_commodity_number.max' => 'Kolom id aset maksimal :max karakter!',

            'name.required' => 'Kolom nama wajib diisi!',
            'name.min' => 'Kolom nama minimal :min karakter!',
            'name.max' => 'Kolom nama maksimal :max karakter!',

            'amount.required' => 'Kolom jumlah wajib diisi!',
            'amount.min' => 'Kolom jumlah minimal :min karakter!',
            'amount.max' => 'Kolom jumlah maksimal :max karakter!',

            'register_date.required' => 'Kolom tanggal register wajib diisi!',
            'update_date.required' => 'Kolom tanggal update wajib diisi!',
            'condition.required' => 'Kolom kondisi wajib diisi!',
        ];
    }
}
