<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Plank\Mediable\Mediable;

class Agency extends Model
{
    use Mediable;
    protected $fillable = ['name','slug','email','phone_number','address'];

//    use InteractsWithMedia;

    /**
     * An agency belongs to one or more users.
     *
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot('role_id');
    }

    /**
     * An agency belongs to one or more roles.
     *
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Get admin user of  An agency.
     *
     * @return User
     */
    public function agencyAdmin(): User
    {
        return $this->users()->where('role_id', Role::AGENCY_ADMIN)->first();
    }
    /**
     * Get all admin users of An agency.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function agencyAdmins(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->users()->where('role_id', Role::AGENCY_ADMIN)->get();
    }

    /**
     * An agency has one or more properties.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function properties(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Property::class);
    }

    /**
     * User Belongs To An agency
     *
     * @param $user
     * @return Bool
     */
    public function hasUser($user): bool
    {
        return $this->users()
            ->where('user_id', $user->getKey())
            ->exists();
    }

}
