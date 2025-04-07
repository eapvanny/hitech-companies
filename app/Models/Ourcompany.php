<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ourcompany extends Model
{
    use HasFactory;
    protected $table = 'ourcompanys';

    protected $fillable = [
        'id',
        'description_kh',
        'description_en',
        'active_status',
    ];

    
}
