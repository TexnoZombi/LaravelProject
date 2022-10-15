<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class helpRequest extends FormRequest
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
            'email' => 'Required|email',
            'question' => 'Required|min:10|max:500',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Поле email должно быть заполнено',
            'email.email' => 'Поле email не соответствует шаблону',
            'question.required' => 'Поле с проблемой не должно быть пустым',
            'question.min' => 'Поле не должно содержать меньше 10 символов',
            'question.max' => 'Лимит символов всего лишь 500 символов',
        ];
    }
}
