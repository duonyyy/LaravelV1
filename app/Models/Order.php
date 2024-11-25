<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable =[
        'user_id',
        'recipient_name',
        'phone',
        'address',
        'total_price',
        'status',
        'payment',
        'shipping',
        'note',  

    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

   
}
