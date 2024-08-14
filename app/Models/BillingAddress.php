<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'town_city',
        'state',
        'country',
        'postcode_zip',
        'street_address',
        'phone',
        'email',
    ];
}
