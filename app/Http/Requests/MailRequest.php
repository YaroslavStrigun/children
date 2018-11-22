<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailRequest extends FormRequest
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
            'text' => 'required',
            'email' => 'required|email',
            'phone' => 'sometimes|digits_between:5,15',
        ];
    }

    public function messages()
    {
        return [
            'required' =>'Поле :attribute обязательно для заполнения.',
            'email'  => 'Вы ввели email не правильно!',
            'digits_between' => 'Поле :attribute должно быть между 5 и 15 символами'
        ];
    }
}
