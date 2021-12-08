<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgencyUser extends Model
{
    protected $fillable = ['user_id','agency_id','role_id'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'agency_user';

    /**
     * An Agency user belongs to an agency.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agency(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Agency::class);
    }

    /**
     * An Agency user belongs to a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * An Agency user belongs to a role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Is user agency admin.
     *
     * @param int $userId
     * @param int $agencyId
     *
     * @return bool
     */
    public function isUserTeamAdmin(int $userId, int $agencyId): bool
    {
        return AgencyUser::where(['user_id' => $userId, 'agency_id' => $agencyId, 'role_id' => Role::AGENCY_ADMIN])->exists();
    }
}
