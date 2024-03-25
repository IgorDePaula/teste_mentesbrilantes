<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'name' => 'required|min:3',
            'address_id' => 'required|exists:addresses,id',
            'city_id' => 'required|exists:cities,id',
            'state_id' => 'required|exists:states,id'
        ];
    }

    public function messages()
    {
        {
            return [
                'name.required' => 'O nome é obrigatório',
                'name.min' => 'O nome deve ter no mínimo 3 caracteres',
                'address_id.required' => 'O endereço é obrigatório',
                'address_id.exists' => 'O endereço não existe',
                'city_id.required' => 'A cidade é obrigatória',
                'city_id.exists' => 'A cidade não existe',
                'state_id.required' => 'O estado é obrigatório',
                'state_id.exists' => 'O estado não existe'
            ];
        }
    }
}
