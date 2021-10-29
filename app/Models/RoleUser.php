<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use HasFactory;

    protected $table = 'role_user';
    public $fillable = ['user_id', 'role_id', 'created_at', 'updated_at'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Role()
    {
        return $this->belongsTo(Role::class);
    }
}
