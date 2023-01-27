<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use HasFactory;

    protected $table = 'units';

    protected $fillable = [
        'amount',
        'unit_name',
    ];

    // public function product() {
    //     return $this->belongsToMany(Product::class, 'unit_details', 'unit_id', '');
    // }
}
