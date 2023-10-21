<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;

use function App\Helpers\FailedValidationHandler;

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
        $name_rule =  ['required', 'unique:products', 'max:50', 'min:3'];
        $price_rule = ['required', 'numeric'];
        if ($this->isMethod('PUT')) {
                $name_rule = [ Rule::unique('products', 'name')->ignore($this->product), 'max:50', 'min:3'];
                unset($price_rule[0]);
        }
        return [
            'name' => $name_rule,
            'price' => $price_rule,
            'description' => ['max:255', 'min:3'],
            'categories.*' => ['exists:categories,id']
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        FailedValidationHandler($validator);
    }
}
