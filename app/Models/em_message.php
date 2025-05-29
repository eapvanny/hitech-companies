<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class em_message extends Model
{
    use HasFactory;

    protected $table = 'em_massages';

    protected $fillable =[
        'em_name',
        'img',
        'img_founder',
        'founder_name',
        'message_kh',
        'message_en',
        'active_status',
    ];
}
