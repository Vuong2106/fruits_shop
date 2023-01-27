<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitDetail extends Model
{
    use HasFactory;

    protected $table = 'unit_details';
    protected $fillable = [
        'unit_id',
        'product_id',
    ];

    // public function product_unit() {
    //     return $this->belongsToMany(Product::class, 'unit_details', 'unit_id', 'product_id');
    // }
}
