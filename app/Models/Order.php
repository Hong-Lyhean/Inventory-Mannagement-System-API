<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ["id"];
    protected $table = "orders";

    public function customer()
    {
        return $this->belongsTo(Customer::class, "customer_id");
    }

    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class, "order_id");
    }
}
