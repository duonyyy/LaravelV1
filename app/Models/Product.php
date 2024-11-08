<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [ // Sửa từ $filltable thành $fillable
        'name',       
        'price',     
        'description',
        'category_id',
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
