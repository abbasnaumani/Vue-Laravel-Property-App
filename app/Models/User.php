<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Plank\Mediable\Mediable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use Mediable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'email',
        'last_name',
        'password',
        'phone_number',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * A user belongs to one or more agencies.
     *
     * @return BelongsToMany
     */
    public function agencies(): BelongsToMany
    {
        return $this->belongsToMany(Agency::class)->withPivot('role_id')->withTimestamps();
    }
    /**
     * User Roles Relation it will return the all user assigned roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
//    public function roles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
//    {
//        return $this->belongsToMany(Role::class);
//    }
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'agency_user', 'user_id', 'role_id')->withPivot('agency_id')->withTimestamps();
    }
    /**
     * Helper method to return the full name of the user.
     *
     * @return string
     */
    public function fullName(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }
    /**
     * User has many Properties
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function properties(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Property::class);
    }
    /**
     * Is user agency admin.
     *
     * @param int $agencyId
     *
     * @return bool
     */
    public function isAgencyAdmin(int $agencyId): bool
    {
        return AgencyUser::where(['user_id' => $this->id, 'agency_id' => $agencyId, 'role_id' => Role::AGENCY_ADMIN])->exists();

    }
    /**
     * User belongs to many agencies
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agencyUsers(): HasMany
    {
        return $this->hasMany(AgencyUser::class);
    }
}
