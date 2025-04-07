<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companyinfo extends Model
{
    use HasFactory;
    protected $table = 'company_informations';

    protected $fillable = [
        'logo',
        'address',
        'location_link',
        'company_email',
        'company_phone',
        'copy_right',
    ];
}
