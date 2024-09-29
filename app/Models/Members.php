<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'alias', 'description', 'content', 'image', 'email', 'phone'
    ];
    public function articles()
    {
        return $this->belongsToMany(ArticlesService::class, 'article_member', 'member_id', 'article_service_id');
    }
}
