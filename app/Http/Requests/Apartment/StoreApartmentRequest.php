<?php

namespace App\Http\Requests\Apartment;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreApartmentRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'rent' => ['required', 'numeric', 'min:1', 'max:500'],
            'number_of_rooms' => ['required', 'integer', 'min:1', 'max:5'],
            'image' => ['nullable', 'file', 'mimes:jpg,jpeg,png,gif,webp', 'max:2048'], // max size 2MB
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The apartment name is required.',
            'name.string' => 'The apartment name must be a string.',
            'name.max' => 'The apartment name may not be greater than 255 characters.',
            'rent.required' => 'The rent amount is required.',
            'rent.numeric' => 'The rent amount must be a number.',
            'rent.min' => 'The rent amount must be at least 1.',
            'rent.max' => 'The rent amount may not be greater than 500.',
            'number_of_units.required' => 'The number of units is required.',
            'number_of_units.integer' => 'The number of units must be an integer.',
            'number_of_units.min' => 'The number of units must be at least 1.',
            'image.file' => 'The image must be a valid file.',
            'image.mimes' => 'The image must be a file of type: jpg, jpeg, png, gif, webp.',
            'image.max' => 'The image may not be greater than 2MB.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([

                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422)
        );
    }
}
