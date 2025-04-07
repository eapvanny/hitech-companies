<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corevalue extends Model
{
    use HasFactory;
    protected $table = 'core_values';

    protected $fillable = [
        'title_kh',
        'title_en',
        'description_kh',
        'description_en',
        'active_status',
    ];
}
