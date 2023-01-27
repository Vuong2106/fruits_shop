<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Customer extends Model
{
    use HasFactory, HasRoles;

    protected $table = 'customers';

    protected $fillable = [
        'username',
        'fullname',
        'email',
        'password',
        'phone_number',
        'address',
        'image',
    ];

    public function order() {
        return $this->hasMany(Order::class,'customer_id', 'id');
    }

    public function userType() {
        return $this->belongsTo(UserType::class);
    }

    public function feedback() {
        return $this->hasMany(Feedback::class);
    }
}
