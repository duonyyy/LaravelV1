<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
    use HasFactory;
    protected $table = 'product_comment_';
    protected $filltable =[
        'product_id',
        'user_id',
        'comment',
        'vote_start'
         
    ];
}
