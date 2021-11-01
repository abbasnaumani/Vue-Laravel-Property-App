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
     * @return \Illuminate\Http\Response
     */
    public function userList(){
        $users = $this->getAllUsers();
        dd($users);
        return $this->success(trans('get_user_list'),$users);
    }
}
