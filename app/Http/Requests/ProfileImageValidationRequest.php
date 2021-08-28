<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileImageValidationRequest extends FormRequest
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
            'image' => 'required|image|max:100|mimes:jpg,png',
        ];
    }

    public function messages()
    {
        return [
            'image.mimes' => 'Картинка должна быть в формате jpg или png',
            'image.required' => 'Картинка обязательна',
            'image.max' => 'Недопустимый размер картинки',
            'image.image' => 'Картинка должна быть картинкой'
            // 'image.mimes' => 'У картинки должен быть формат png'
        ];
    } 
}
