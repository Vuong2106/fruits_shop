<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'title',
        'price',
        'discount',
        'weight',
        'weight_unit',
        'thumbnail',
        'description',
    ];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function galery() {
        return $this->hasMany(Galery::class, 'galery_id', 'id');
    }

    // public function order() {
    //     return $this->belongsToMany(Order::class);
    // }

}
