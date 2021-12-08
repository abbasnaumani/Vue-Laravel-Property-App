<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use HasFactory;
    /**
     * Defining Constants
     *
     */
    const SUPER_ADMIN = 1;
    const ADMIN = 2;
    const AGENT = 3;
    /**
     * Define table name
     *
     */
    protected $table = 'role_user';
    /**
     * Defining fillables
     *
     */
    public $fillable = ['user_id', 'role_id', 'created_at', 'updated_at'];
    /**
     * Role User belongs to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function User(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Role User belongs to a Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Role(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
