<?php

namespace App\Http\Controllers;

use App\Events\ActionEvent;
use App\Http\Requests\User\UpdatePasswordRequest;
use App\Http\Requests\User\UserProfileRequest;
use App\Models\MenuRole;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    /**
     * Initialize the user service in constructor
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->middleware('auth');
        $this->userService = $userService;
    }

    /**
     * Display a listing of the users
     *
     */
    public function userList()
    {
        $users = $this->getAllUsers();
        $this->setApiSuccessMessage(trans('user.get_user_list'), $users);
        return $this->getApiResponse();
    }
    /**
     * Edit the user profile
     *
     */
    public function editUserProfile(){
        $usersId = $this->getAuthUserId();
        $user = User::find($usersId);
        $this->setApiSuccessMessage(trans('user.user_found'), $user);
        return $this->getApiResponse();
    }
    /**
     * Update the user profile
     * @param UserProfileRequest $request
     */
    public function updateUserProfile(UserProfileRequest $request){
        $this->userService->updateUserProfile($request);
        return $this->getApiResponse();
    }
    /**
     * Update the user password
     * @param UpdatePasswordRequest $request
     */
    public function updateUserPassword(UpdatePasswordRequest $request){
        $this->userService->updateUserPassword($request);
        return $this->getApiResponse();
    }
    /**
     * Display a listing of the side bar menus
     *
     */
    public function userMenu()
    {
        $menuItems = MenuRole::with('menu')->where('is_allow', 1)->whereIn('role_id', $this->userRoles())
            ->whereHas('menu', function ($query) {
                $query->where('is_active', 1);
            })
            ->get()
            ->sortBy(function ($menuitem, $key) {
                return $menuitem->sort_order;
            });
        $prepareMenus = [];
        if (isset($menuItems) && count($menuItems) > 0) {
            foreach ($menuItems as $menuItem) {
                if (intval($menuItem->menu->parent_id)>0) {
                    $prepareMenus['sub_menu'][$menuItem->menu->parent_id][$menuItem->id] = $menuItem->menu;
                }else{
                    $prepareMenus['main_menu'][$menuItem->id] = $menuItem->menu;
                }
            }
        }
        $this->setApiSuccessMessage(trans('user.get_user_menu'),$prepareMenus);
        return $this->getApiResponse();
    }

}
