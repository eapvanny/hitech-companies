<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    protected $fillable = [
        'img',
        'title_kh',
        'title_en',
        'description_kh',
        'description_en',
        'seo_title',
        'seo_description',
        'active_status',
    ];
}