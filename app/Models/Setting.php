<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'settings';
    protected $fillable = [
        'site_name ',
        'site_logo',
        'site_favicon ',
        'site_map',
        'site_timezone ',
        'site_footer ',
        'contact_phone ',
        'contact_address',
        'contact_email',
    ];
}
