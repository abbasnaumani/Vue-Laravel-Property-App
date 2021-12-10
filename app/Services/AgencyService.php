<?php

namespace App\Services;

use App\Models\Agency;
use App\Models\User;
use App\Services\BaseService\BaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgencyService extends BaseService
{
    /**
     * Get Unique Agency Slug
     *
     * @param array $params
     * @return string
     */
    public function getUniqueAgencyByParams(array $params = []): string
    {
        $type = $params['type'] ?? null;
        if ($type) {
            $explodeString = $type == 'slug' ? '-' : ' - ';
            $name = isset($params['name']) ? trim($params['name']) : '';
            $agencies = Agency::select($type)->where($type, "like", $name)
                ->orWhere($type, "like", $name . "$explodeString%")->get();
            if (isset($agencies) && !$agencies->isEmpty()) {
                $maxNumber = 0;
                foreach ($agencies as $agency) {
                    $pieces = explode($explodeString, $agency);
                    $number = intval(end($pieces));
                    if ($maxNumber < $number) {
                        $maxNumber = $number;
                    }
                }
                $name .= $explodeString . ($maxNumber + 1);
            }
        }

        return $name ?? '';
    }
    /** Update the Agency profile
     * @param Request $request
     * @param int $id
     */
    public function updateAgencyProfile(Request $request, int $id)
    {
        $userId = $this->getAuthUserId();
        $user = User::find($userId);
        $agency = Agency::find($id);
        if (Hash::check($request->password, $user->password)) {
            $agency->name = $request->agency_name;
            $agency->email = $request->agency_email;
            $agency->phone_number = $request->agency_phone_number;
            $agency->address = $request->agency_address;
            $agency->save();
            $this->setApiSuccessMessage(trans('agency.update_profile'), $agency);
        }else{
            $this->setApiErrorMessage(trans('user.password_not_match'));
        }
//        $agency->image_path = $request->image_file;   // images will done separately
    }
    /**
     * Get all agency users by agency slug.
     * @param string $slug
     *
     */
    public function getAgencyUsersBySlug(string $slug){
        $agency = Agency::where('slug', $slug)->first();
        $agencyUsers = $agency->users ?? null;
        $this->setApiSuccessMessage(trans('agency.agency_users_found'), $agencyUsers);
    }
}
