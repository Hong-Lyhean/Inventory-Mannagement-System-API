<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $guarded = ["id"];
    protected $hidden = ['password'];

    public function customer()
    {
        return $this->hasMany(Customer::class, "staff_id");
    }

    public function role()
    {
        return $this->belongsTo(Role::class, "role_id");
    }
}
