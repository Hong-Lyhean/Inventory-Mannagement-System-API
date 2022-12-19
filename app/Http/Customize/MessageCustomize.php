<?php

namespace App\Http\Customize;

use Illuminate\Http\JsonResponse;

class MessageCustomize
{
    private const InvalidedValue = "40004";
    private const SuccessAction = "20000";

    public function MessageFailedValidation($validator)
    {
        return new JsonResponse([
            "error" => $validator->errors(),
            "code"  => $this::InvalidedValue,
            "message" => "the given data was invalided"
        ], 422);
    }

    public function MessageInvalidedValue($name, $id){
        return response()->json([
            "error" => [
                "code" => $this::InvalidedValue,
                "message" => "{$name} with id {$id} doesn't exist!!"
            ]
        ]);
    }

    public function MessageSuccessGet($name): array
    {
        return [
            "code" => $this::SuccessAction,
            "message" => "Got {$name} list success"
        ];
    }

    public function MessageSuccessDelete($name, $id): array
    {
        return [
            "code" => $this::SuccessAction,
            "message" => "Deleted {$name} with id {$id} success"
        ];
    }

    public function MessageSuccessShow($name, $id): array
    {
        return [
            "code" => $this::SuccessAction,
            "message" => "Got {$name} with {$id} success"
        ];
    }

    public function MessageSuccessCreate($name): array
    {
        return [
            "code" => $this::SuccessAction,
            "message" => "Created {$name} success"
        ];
    }

    public function MessageSuccessUpdate($name, $id): array
    {
        return [
            "code" => $this::SuccessAction,
            "message" => "Updated {$name} with id {$id} success"
        ];
    }
}
