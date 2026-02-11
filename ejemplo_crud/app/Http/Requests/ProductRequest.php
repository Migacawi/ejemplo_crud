<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $isUpdate = $thhis->isMethod('put') || $this->isMethod('patch');
        return [
            'name'=> $isUpdate ? 'sometimes|string|max:255' : 'required|string|max:255',
            'description'=> 'nullable'|'string',
            'price'=> $isUpdate ? 'sometimes|numeric|min:0' : 'required|numeric|min:0',
            'stock'=>$is_Update ? 'sometimes|integer|min:0' :  'required|integer|min:0',
        ];
    }
    public function messages()
{
    return [
        'name.required' => 'El nombre es obligatorio.',
        'name.string'   => 'El nombre debe ser una cadena de texto.',
        'name.max'      => 'El nombre no puede superar los 255 caracteres.',

        'description.string' => 'La descripción debe ser una cadena de texto.',

        'price.required' => 'El precio es obligatorio.',
        'price.numeric'  => 'El precio debe ser un número.',
        'price.min'      => 'El precio no puede ser menor a 0.',

        'stock.required' => 'El stock es obligatorio.',
        'stock.integer'  => 'El stock debe ser un número entero.',
        'stock.min'      => 'El stock no puede ser menor a 0.',
    ];
}

}
