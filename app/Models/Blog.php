<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';
    protected $fillable = [
        'img',
        'title',
        'title_kh',
        'short_text',
        'short_text_kh',
        'description',
        'description_kh',
        'author',
        'seo_title',
        'seo_description',
        'active_status',
    ];
}
