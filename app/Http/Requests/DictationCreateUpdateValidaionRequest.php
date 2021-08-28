<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DictationCreateUpdateValidaionRequest extends FormRequest
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
            'title' => 'required|min:6',
            'link' => 'required',
            'started_at' => 'required',
            'finished_at' => 'required',
            'description' => 'required',
        ];
    }

    public function messages() 
    {
        return [
            'title.required' => 'Название обязательно',
            'link.required' => 'Ссылка обязательна',
            'started_at.required' => 'Начало обязательно',
            'finished_at.required' => 'Конец обязателен',
            'description.required' => 'Описание обязательно',
            'started_at.date' => 'Неправильный формат даты',
            'finished_at.date' => 'Неправильный формат даты'
        ];
    }
}
