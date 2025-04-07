<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'abouts';

    protected $fillable = [
        'id',
        'img',
        'title_kh',
        'title_en',
        // 'description_kh',
        // 'description_en',
        'active_status'
    ];
}
