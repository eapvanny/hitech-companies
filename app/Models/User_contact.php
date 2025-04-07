<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_contact extends Model
{
    use HasFactory;

    protected $table = 'user_contacts';

    protected $fillable = [
        'name',
        'email',
        'subject',
        'phone',
        'description',
    ];
}
