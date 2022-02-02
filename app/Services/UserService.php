<?php

namespace App\Services;

use App\Models\AgencyUser;
use App\Models\Role;
use App\Models\User;
use App\Services\BaseService\BaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserService extends BaseService
{
    /** Add the Agency user
     * @param Request $request
     *
     */
    public function addAgencyUser(Request $request){

        DB::beginTransaction();
        try {
            $user = User::create($this->userData($request));
            $user->agencyUsers()->create($this->agencyUsersData($user->id,$request));
            DB::commit();
            $this->setApiSuccessMessage(trans('user.user_store'),$user);
        } catch (\Exception $e) {
            DB::rollback();
            $this->setApiErrorMessage(trans('user.user_not_store'));
        }
    }
    /**
     * Update the specified user from storage.
     *
     * @param Request $request
     * @param int $id
     *
     */
    public function updateAgencyUser(Request $request,int $id){
        DB::beginTransaction();
        try {
            $user = User::with('roles','agencies')->find($id);
            $user->email = $request->email;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->phone_number = $request->phone_number;
            $user->save();
            $agency = $user->agencies()->first();
            $user->agencies()->detach($agency->id);
            $user->agencies()->attach($agency->id,['role_id' => $request->role_id]);
            DB::commit();
            $this->setApiSuccessMessage(trans('user.user_update'),$user);
        } catch (\Exception $e) {
            DB::rollback();
            $this->setApiErrorMessage(trans('user.user_not_store'));
        }
    }
    /**
     * Prepare User Data for agency.
     * @param Request $request
     *
     * @return array
     */
    private function userData(Request $request): array
    {
        return [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' =>  $request->phone_number,
            'password' => Hash::make('12345678'),
        ];
    }
    /**
     * Prepare User Data for agency.
     * @param int $userId
     * @param Request $request
     * @return array
     */
    private function agencyUsersData(int $userId,Request $request): array
    {
        return [
            'user_id' => $userId,
            'agency_id' => $request->agency_id,
            'role_id' => $request->role_id,
        ];
    }
    /** Update the user password
     * @param Request $request
     *
     */
    public function updateUserPassword(Request $request){
        $userId = $this->getAuthUserId();
        $user = User::find($userId);
        if (Hash::check($request->password_data['current_password'], $user->password)){
            if (!Hash::check($request->password_data['new_password'], $user->password)) {
                $user->password = Hash::make($request->password_data['new_password']);
                $user->save();
                $this->setApiSuccessMessage(trans('user.update_password'), $user);
            }else{
                $this->setApiErrorMessage(trans('user.password_match'));
            }
        }else{
            $this->setApiErrorMessage(trans('user.current_password_not_match'));
        }


    }
    /** Update the user profile
     * @param Request $request
     *
     */
    public function updateUserProfile(Request $request)
    {
        $userId = $this->getAuthUserId();
        $user = User::find($userId)->with('roles','agencies')->first();
        if (Hash::check($request->profile_data['password'], $user->password)) {
            $user->first_name = $request->profile_data['first_name'];
            $user->last_name = $request->profile_data['last_name'];
            $user->email = $request->profile_data['user_email'];
            $user->phone_number = $request->profile_data['phone_number'];
            $user->save();
            $this->setApiSuccessMessage(trans('user.update_profile'), $user);
        }else{
            $this->setApiErrorMessage(trans('user.password_not_match'));
        }
//        $user->image_path = $request->image_file;   // images will done separately


    }
}

