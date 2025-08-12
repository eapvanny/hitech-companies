<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;
    protected $fillable = [
        'img',
        'active_status',
    ];

    protected $casts = [
        'img' => 'array', // Cast the img field as an array
    ];
}
