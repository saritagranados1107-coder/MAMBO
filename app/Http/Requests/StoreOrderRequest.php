<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'max:4'],
            'customer_id' => ['required', 'integer', 'exists:customers,id'],
            'status' => ['required', 'string', 'max:255'],
            'total' => ['required', 'numeric'],
        ];
    }

    public function messages(): array
    {
        return [
            'codigo.unique' => 'Ya existe un pedido con ese código.',
        ];
    }
}