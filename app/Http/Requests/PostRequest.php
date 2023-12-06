<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'name'  => 'required|string|min:4',
            'email' => 'required|email|unique:contacts',
            'message' => 'required|string|min:3'
        ];
    }

    public function messages()
    {
        return [
            'name.required'  => 'Harap isi nama anda',
            'email.required'  => 'Harap isi alamat email anda',
            'email.unique' => 'Data yang anda masukkan sudah ada',
            'message.required'  => 'Harap isi pesan anda',
        ];
    }
}
