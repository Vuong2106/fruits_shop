<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'feedbacks';

    protected $fillable = [
        'firstname',
        'lastname',
        'customer_id',
        'email',
        'phone_number',
        'title',
        'content',
    ];

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

}
