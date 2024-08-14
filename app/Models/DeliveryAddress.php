<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'shipping_full_name',
        'shipping_town_city',
        'shipping_state',
        'shipping_country',
        'shipping_postcode_zip',
        'shipping_street_address',
        'shipping_phone',
        'shipping_email',
    ];
}
