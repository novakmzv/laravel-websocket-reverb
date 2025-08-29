<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class NotificationRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'message' => 'required|string|max:255|min:3',
            'user' => 'nullable|string|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'message.required' => 'El mensaje es obligatorio',
            'message.string' => 'El mensaje debe ser texto',
            'message.max' => 'El mensaje no puede exceder 255 caracteres',
            'message.min' => 'El mensaje debe tener al menos 3 caracteres',
            'user.string' => 'El usuario debe ser texto',
            'user.max' => 'El nombre de usuario no puede exceder 100 caracteres',
        ];
    }
}
