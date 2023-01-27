<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'orders';

    protected $fillable = [
        'customer_id',
        'order_code',
        'fullname',
        'email',
        'phone_number',
        'address',
        'coupon_id',
        'note',
        'status',
    ];

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    // public function product() {
    //     return $this->belongsToMany(Product::class, 'product_id');
    // }

    public function bill() {
        return $this->belongsTo(Bill::class, '');
    }

    public function orderDetails() {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }
}
