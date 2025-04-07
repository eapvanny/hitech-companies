<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Society extends Model
{
    use HasFactory;
    protected $table = 'societies';
    protected $fillable = [
        'id',
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
