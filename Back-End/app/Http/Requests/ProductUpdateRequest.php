<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
        'title' => ['sometimes','string','max:255', 'min:3'],
        'description' => ['sometimes','string', 'max:255', 'min:10'],
        'price' => ['sometimes','numeric', 'between:0,999999.99'],
        'category' => ['sometimes','in:electronics,grocery,cloth,appliances'],
        ];
    }
    public function messages(){
        return [
            'title.min' => 'The title must be at least 3 characters long.',
            'description.min' => 'The description must be at least 10 characters long.',
            'price.numeric' => 'The price must be a valid number.',
            'price.between' => 'The price must be a valid number with up to two decimal places.',
            'category.in' => 'The category must be one of the following: electronics, grocery, cloth, appliances.',
        ];
    }
    
}
