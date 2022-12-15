<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $guarded = ["id"];
    protected $table = "suppliers";

    public function product()
    {
        return $this->hasMany(Product::class, "supplier_id");
    }
}
