<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class adsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'title' => 'Required|min:10|max:150',
            'ads' => 'Required|min:50|max:1500',
            'annotation' => 'Required|min:20|max:100',
            'tel' => 'Required|min:12|max:50',
            'image' => 'mimes:jpg,jpeg,png',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Тема объявления должна быть заполнено',
            'title.min' => 'Поле темы не должно содержать меньше 10 символов',
            'title.max' => 'Лимит символов 150 символов',
            'annotation.required' => 'Название объявления должно быть заполнено',
            'annotation.min' => 'Поле аннотации не должно содержать меньше 20 символов',
            'annotation.max' => 'Лимит символов в аннотации 100 символов',
            'ads.required' => 'Объявления должно быть заполнено',
            'ads.min' => 'Поле объявления не должно содержать меньше 10 символов',
            'ads.max' => 'Лимит символов 1500 символов',
            'tel.required' => 'Укажите номер телефона, по которому можно с Вами связаться',
            'tel.min' => 'Поле с телефоном не должно содержать меньше 12 символов',
            'tel.max' => 'Лимит символов 50 символов',
            'image.mimes' => 'Можно загружать только изображения данных форматов: jpg, jpeg, png',
        ];
    }
}
