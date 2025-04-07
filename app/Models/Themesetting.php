<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Themesetting extends Model
{
    use HasFactory;
    protected $table = 'them_settings';
    protected $fillable = [
        'decor',
        'footer_decor',
    ];
}
