<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category_id' => ['required', 'int'],
            'title' => ['required', 'min:2','max:255','string'],
            'description' => ['required', 'string'],
            'isbn' => ['required', 'string'],
            'price' => ['required'],
            'image' => ['image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'publisher' => ['date'],
            'quantity' => ['required']
        ];
    }
}
