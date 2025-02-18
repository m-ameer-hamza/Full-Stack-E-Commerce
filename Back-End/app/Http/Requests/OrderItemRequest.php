<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderItemRequest extends FormRequest
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
        // return [
        //     'order_id' => 'required|exists:orders,id',
        //     'product_id' => 'required|exists:products,id',
        //     'quantity' => 'required|integer|min:1',
        //     'price' => 'required|numeric|min:0.01',
        // ];

         return [
       
            'quantity' => ['required','integer','min:1'],
            'amount' => ['required','decimal','min:0.01'],
        ];
    }
}
