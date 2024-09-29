<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenusServices extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'parent_id', 'alias', 'description'];

    // Liên kết với bài viết
    public function articles()
    {
        return $this->hasMany(ArticlesService::class, 'menus_services_id');
    }

    // Liên kết với menu con
    public function children()
    {
        return $this->hasMany(MenusServices::class, 'parent_id');
    }

    // Liên kết với menu cha
    public function parent()
    {
        return $this->belongsTo(MenusServices::class, 'parent_id');
    }
}
