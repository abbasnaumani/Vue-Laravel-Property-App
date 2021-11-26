<?php

namespace App\Http\Controllers;

use App\Events\ActionEvent;
use App\Models\MenuRole;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
     * Display a listing of the users
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
