<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;
    protected $table = 'cart_detail';
    protected $fillable =[
        'cart_id',  
        'product_id',  
        'quantity',  
    ];

    public function cart(){
        return $this->belongsTo(Cart::class, 'cart_id', 'id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
