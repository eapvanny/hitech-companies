<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accreditation extends Model
{
    use HasFactory;

    protected $table = 'accreditations';

    protected $fillable = [
        'logo',
        'name_kh',
        'name_en',
        'active_status',
    ];
}
