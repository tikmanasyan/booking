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
            'email' => 'required|email',
            'password' => 'required|min:4|max:12'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Խնդրում ենք լրացրեք դաշտը․',
            'email.email' => 'Մուտքագրեք ճիշտ էլ․ հասցե․',
            'password.required' => 'Խնդրում ենք լրացրեք դաշտը․',
            'password.min' => 'Պետք է մուտքագրել նվազագույնը 4 նիշ․',
            'password.max' => 'Պետք է մուտքագրել առավելագույնը 12 նիշ․',
        ];
    }
}
