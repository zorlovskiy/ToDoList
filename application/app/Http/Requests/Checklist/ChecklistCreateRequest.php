<?php

namespace App\Http\Requests\Checklist;

use Illuminate\Foundation\Http\FormRequest;

class ChecklistCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' =>['required', 'exclude_if:name,null|max:255', 'unique:checklists,name'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => 'Список с таким названием уже существует',
            'name.required' => 'Для создания списка необходимо указать ее название.',
            'name.max' => 'Поле \'Название писка\' не должно превышать 255 символов.',
        ];
    }
}
