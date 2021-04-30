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
            'login'   => 'required',
//            'mdp'   => 'required|min:5|max:255',
        ];
    }

    public function messages()
    {
        return [
            'login.required' => 'Không được để trống',
//            'mdp.required' => 'Không được để trống',
//            'mdp.min' => 'Độ dài lớn hơn 5 ký tự',
//            'mdp.max' => 'Độ dài nhỏ hơn 255 ký tự',
        ];
    }
}
