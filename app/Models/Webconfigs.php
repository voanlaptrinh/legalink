<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webconfigs extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',//
        'logo',//
        'website',
        'code',//
        'gg_map',//
        'gg_analytic',
        'address',//
        'email',//
        'phone',//
        'description',//
        'facebook',//
        'zalo',//
        'pinterest',
        'youtube',
        'dribbble',
        'whats_app',
        'tiktok',
        'telegram',
        'google',
        'twitter',
        'instagram',
        'reddit',
        'linkedin',
        'key'
    ];
}
