<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SupplierResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "image" => $this->whenNotNull($this->image),
            "address" => $this->address,
            "phone" => $this->phone,
            "fax" => $this->fax,
            "email" => $this->email,
            "other_detail" => $this->other_detail,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at
        ];
    }

}
