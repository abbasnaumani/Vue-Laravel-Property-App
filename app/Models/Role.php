<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    public $fillable = ['name'];
    /**
     * Defining Constants
     *
     */
    const SUPER_ADMIN = 1;
    const AGENCY_ADMIN = 2;
    const AGENT = 3;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class);
    }

    public function parentMenus()
    {
        return $this->belongsToMany(Menu::class)->where('parent_id', 0)->orderBy('sort_order');
    }

    public function childMenusByParentId($parentId)
    {
        return $this->belongsToMany(Menu::class)->where('parent_id', $parentId)->orderBy('sort_order');
    }
}
