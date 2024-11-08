<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  Illuminate\Support\Facades\Auth;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $filltable =[
        'name',
    ];
    public function product(){
        return $this->hasOne(Product::class);
  }
}
