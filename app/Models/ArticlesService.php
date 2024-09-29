<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticlesService extends Model
{
    use HasFactory;
    protected $fillable = [
        'menus_services_id', 'name', 'content', 'views', 'alias', 'members_ids'
    ];

    // Cast the members_ids attribute as an array
    protected $casts = [
        'members_ids' => 'array',
    ];

    // Relationship with the MenuService model
    public function menuService()
    {
        return $this->belongsTo(MenusServices::class, 'menus_services_id');
    }

    // Relationship with the Member model
    public function members()
    {
        // Kiểm tra nếu members_ids không phải là mảng thì giải mã từ JSON
        $membersIds = is_array($this->members_ids) ? $this->members_ids : json_decode($this->members_ids, true);
    
        return Members::whereIn('id', $membersIds)->get();
    }
    

    // Add or update members responsible for this article
    public function setMembers(array $membersIds)
    {
        $this->members_ids = json_encode($membersIds);
        $this->save();
    }
    public function getMembersArray()
    {
        return json_decode($this->members_ids, true) ?? [];
    }

}
