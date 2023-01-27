<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    use HasFactory;

    protected $table = 'galery';

    protected $fillable = [
        'product_id',
        'thumbnail',
    ];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
