<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\BillingAddress;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Wishlist;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function wishlist($product_id){
        return $this->hasMany(Wishlist::class)->where('product_id', $product_id)->first();
    }

    public function cart($product_id){
        return $this->hasMany(Cart::class)->where('product_id', $product_id)->first();
    }

    public function AllCart(){
        return $this->hasMany(Cart::class);
    }

    public function AllOrder(){
        return $this->hasMany(Order::class)->whereNot('payment_status', 'pending');
    }

    public function ViewAllOrder(){
        return $this->hasMany(Order::class);
    }

    public function AllWishlist(){
        return $this->hasMany(Wishlist::class);
    }

    public function billingAddress(){
        return $this->hasOne(BillingAddress::class);
    }
}
