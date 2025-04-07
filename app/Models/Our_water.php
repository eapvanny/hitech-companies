<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Our_water extends Model
{
    use HasFactory;
    protected $table = 'our_waters';

    protected $fillable = [
        'id',
        'bottle',
        'title',
        'title_kh',
        'description',
        'description_kh',
        'active_status',
    ];
}
