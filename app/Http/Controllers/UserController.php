<?php

namespace App\Http\Controllers;

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
        return $this->success(trans('get_user_list'), ['data' => $users]);
    }
}
