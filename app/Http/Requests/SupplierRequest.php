<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\ValidationException;
use App\Http\Customize\MessageCustomize;

class SupplierRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name" => ["required", "max:100"],
            "image" => [
                "mimes:png,jpg,jpeg,svg",
                File::image()
                    ->min(1024)
                    ->max(5*1024)
                    ->dimensions(
                        Rule::dimensions()
                            ->maxHeight(250)
                            ->maxWidth(300)
                    )
            ],
            "address" => ["max:255"],
            "phone" => [
                "required",
                "max_digits:11",
                "integer",
                "numeric",
                Rule::unique("suppliers")
                    ->ignore($this->supplier)
            ],
            "fax" => [
                "required",
                "max_digits:20",
                Rule::unique("suppliers")
                    ->ignore($this->supplier)
            ],
            "email" => [
                "email:rfc",
                "max:255",
                Rule::unique("suppliers")
                    ->ignore($this->supplier)
            ],
            "other_detail" => ["max:255"]
        ];
    }

    public function failedValidation(Validator $validator)
    {
        $response = (new MessageCustomize)->MessageFailedValidation($validator);
        throw new ValidationException($validator, $response);
    }
}
