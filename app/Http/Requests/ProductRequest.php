<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest {

    //  Determine if the user is authorized to make this request.
    public function authorize(): bool {
        return true;
    }

    //  Get the validation rules that apply to the request.
    public function rules(): array {
        return [
            'image' => [$this->method() === 'POST' ? 'required' : '', 'required', 'image', 'mimes:png,jpg', 'max:2048'],
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'price' => ['required', 'numeric', 'min:3'],
            'description' => ['required', 'string', 'min:3'],
        ];
    }
}
