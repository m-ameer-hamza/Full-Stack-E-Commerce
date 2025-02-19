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
        return [
            'title'=> ['required', 'min:3'],
            'description'=> ['required', 'min:10'],
            'price' => ['required', 'numeric', 'between:0,999999.99'],
            'category'=> ['required', 'in:electronics,grocery,cloth,appliances'],
        ];
    }
    public function messages()
    {
        return [
            'title.min' => 'The title must be at least 3 characters long.',
            'description.min' => 'The description must be at least 10 characters long.',
            'price.numeric' => 'The price must be a valid number.',
            'price.between' => 'The price must be a valid number with up to two decimal places.',
            'category.in' => 'The category must be one of the following: electronics, grocery, cloth, appliances.',
        ];
    }
}
