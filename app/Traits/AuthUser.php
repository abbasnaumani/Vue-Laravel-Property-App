<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use App\Enums\RoleUser;

trait AuthUser
{
    protected $authUserData = null;

    public function authTokenKey()
    {
        return config('constants.app_login_token');
    }

    public function authUserToken($user = null)
    {
        $user = $user ?? $this->getAuthUser();
        return intval($user->id) > 0 ? $user->createToken($this->authTokenKey())->plainTextToken : null;
    }

    public function getAuthUser()
    {
        return $this->authUserData['auth_user'] = (isset($this->authUserData['auth_user']) && $this->authUserData['auth_user'] != null) ? $this->authUserData['auth_user'] : (Auth::check() ? Auth::user() : null);
    }

    public function getAuthUserId()
    {
        $user = $this->getAuthUser();
        return $user->id ?? 0;
    }

    public function userRoles()
    {
        $user = $this->getAuthUser();
        $userRoles = $user ? $user->roles : null;
        return $userRoles ? (array_column($userRoles->toArray(), 'id')) : [];
    }

    public function hasRoleAccess($role = '')
    {
        $hasAccess = false;
        if ($role != '') {
            $user = $this->getAuthUser();
            if ($user) {
                $userRoles = $this->userRoles();
                $hasAccess = (in_array($role, $userRoles)) ? true : false;
            }
            return $hasAccess;
        }
    }

    public function isSuperAdminRole()
    {
        return $this->hasRoleAccess(RoleUser::SUPER_ADMIN);
    }

    public function isAdminRole()
    {
        return $this->hasRoleAccess(RoleUser::ADMIN);
    }
}
