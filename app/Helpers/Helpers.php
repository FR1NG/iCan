<?php

namespace App\Helpers;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

if(! function_exists('FailedValidationHandler')) {
    function FailedValidationHandler(Validator $validator)
    {
            $response = new JsonResponse([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
            throw new HttpResponseException($response);

    }
}
