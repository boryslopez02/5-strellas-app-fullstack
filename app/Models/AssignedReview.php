<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignedReview extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'review_id',
        'user_assigned',
        'pay',
        'deadline',
        'status'
    ];

}
