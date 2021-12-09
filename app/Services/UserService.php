<?php

namespace App\Services;

use App\Models\User;
use App\Services\BaseService\BaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserService extends BaseService
{
    /** Update the user password
     * @param Request $request
     *
     */
    public function updateUserPassword(Request $request){
        $userId = $this->getAuthUserId();
        $user = User::find($userId);
        if (!Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            $this->setApiSuccessMessage(trans('user.update_password'), $user);
        }else{
            $this->setApiErrorMessage(trans('user.password_match'));
        }

    }
    /** Update the user profile
     * @param Request $request
     *
     */
    public function updateUserProfile(Request $request)
    {

        $userId = $this->getAuthUserId();
        $user = User::find($userId);
        if (Hash::check($request->password, $user->password)) {
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->save();
            $this->setApiSuccessMessage(trans('user.update_profile'), $user);
        }else{
            $this->setApiErrorMessage(trans('user.password_not_match'));
        }
//        $user->image_path = $request->image_file;   // images will done separately


    }
}

