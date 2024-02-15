<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'unique:projects', 'max:50', 'string'],
            'description' =>['nullable', 'max:500'],
            'project_image' => ['nullable','image', 'max:2048'],
            'type_id' => ['nullable', 'exists:types,id'],
            'technologies' => ['nullable', 'exists:technologies,id']
        ];
    }
}
