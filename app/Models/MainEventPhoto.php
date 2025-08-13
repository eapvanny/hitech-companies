<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainEventPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'img',
        'title_kh',
        'title_en',
        'des_kh',
        'des_en',
    ];
}
