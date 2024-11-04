<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'image' => 'required',
            'description' => 'required',
            'quantity' => 'required|integer',
            'category_id' => 'required'
        ];
    }

    public function onlyFields()
    {
        return $this->only([
            'name',
            'price',
            'description',
            'quantity',
            'category_id'
        ]);
    }
}
