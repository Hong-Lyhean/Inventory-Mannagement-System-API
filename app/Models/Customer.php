<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = ["id"];
    protected $table = "customers";

    public function staff()
    {
        return $this->belongsTo(Staff::class, "staff_id");
    }

    public function order()
    {
        return $this->hasMany(Order::class, "order_id");
    }
}
