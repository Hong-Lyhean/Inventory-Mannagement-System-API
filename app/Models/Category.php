<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ["id"];
    protected $table = "categories";

    public function product()
    {
        return $this->belongsToMany(Product::class, "category_product", "category_id", "product_id");
    }
}
