<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPays extends Model
{
    use HasFactory;
    protected $fillable = [
        'bank_name', 'image', 'pay_number', 'description','content'
    ];
}
