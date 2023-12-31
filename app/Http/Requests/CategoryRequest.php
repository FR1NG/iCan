<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use function App\Helpers\FailedValidationHandler;

class CategoryRequest extends FormRequest
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
        if ($this->isMethod('PUT')) {
            return [
                'name' => [Rule::unique('categories', 'name')->ignore($this->category), 'max:50'],
                'parent_id' =>  ['exists:categories,id']
            ];
        }
        return [
            'name' => ['required', 'unique:categories', 'max:50'],
            'parent_id' =>  ['exists:categories,id']
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        FailedValidationHandler($validator);
    }
}
