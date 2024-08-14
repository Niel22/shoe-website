<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tracking_no',
        'reference',
        'payment_status',
        'full_name',
        'total_price',
        'street_address',
        'town_city',
        'country',
        'state',
        'postcode_zip',
        'phone',
        'email',
        'payment_mode',
        'payment_id',
        'status_message'
    ];

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
}
