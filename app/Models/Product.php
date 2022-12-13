<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class, "product_id");
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, "supplier_id");
    }

    public function category()
    {
        return $this->belongsToMany(Category::class, "category_product", "product_id", "category_id");
    }
}
