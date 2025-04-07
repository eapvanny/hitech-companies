<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vissionmission extends Model
{
    use HasFactory;

    protected $table = 'vissionmissions';

    protected $fillable = [
        'text_kh',
        'text_en',
        'active_status',
    ];
}
