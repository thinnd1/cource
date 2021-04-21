<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'username'   => 'required',
            'password'   => 'required|min:5|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Không được để trống',
            'password.required' => 'Không được để trống',
            'password.min' => 'Độ dài lớn hơn 5 ký tự',
            'password.max' => 'Độ dài nhỏ hơn 255 ký tự',
        ];
    }
}
