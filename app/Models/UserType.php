<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;

    protected $table = 'user_types';

    protected $fillable = [
        'name',
        'customer_id',
    ];

    public function coupon() {
        return $this->hasMany(Coupon::class, 'coupon_id', 'id');
    }

    public function customer() {
        return $this->hasMany(Customer::class, 'customer_id', 'id');
    }
}
