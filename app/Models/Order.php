<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'cardNumber',
        'cvv',
        'order_note',
        'account_id',
        'status',
        'timeline_id',
        'film_id',
        'chair',
        'quantity',
        'token'
    ];
    public function accounts()
    {
        return $this->hasOne(Account::class, 'id', 'account_id');
    }
    public function timeline()
    {
        return $this->hasOne(Timeline::class,'id', 'timeline_id');
    }
    public function film()
    {
        return $this->hasOne(Film::class,'id', 'film_id');
    }
    public function totalPrice($order)
    {
        return number_format($order->quantity*100000);
    }
}
