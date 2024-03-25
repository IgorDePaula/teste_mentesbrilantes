<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'nullable|string',
            'address_id' => 'nullable|exists:addresses,id',
            'city_id' => 'nullable|exists:cities,id',
            'state_id' => 'nullable|exists:states,id'
        ];
    }

    public function messages()
    {
        {
            return [
                'address_id.exists' => 'O endereço não existe',
                'city_id.exists' => 'A cidade não existe',
                'state_id.exists' => 'O estado não existe'
            ];
        }
    }
}
