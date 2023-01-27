<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'coupons';
    protected $fillable = [
        'percent',
        'code',
        'user_type_id',
        'expiration_date',
    ];

    public function userType() {
        return $this->belongsTo(UserType::class, 'user_type_id');
    }
}
