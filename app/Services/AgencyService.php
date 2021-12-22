<?php

namespace App\Services;

use App\Models\Agency;
use App\Models\Slug;
use App\Models\User;
use App\Services\BaseService\BaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
    public function checkUniqueSlug(array $params = [])
    {
        $id = $params["id"] ?? 0;
        $explodeString = '-' ;
        $name = isset($params['slug']) ? trim($params['slug']) : '';
        $slugs = Agency::select('slug')->where('id','<>',$id)->where(
            function ($query) use ($name, $explodeString) {
                $query->where('slug', "like", $name)
                    ->orWhere('slug', "like", $name . "$explodeString%");
            }
        )->get();  //skip the current and check if slug is unique for other agencies
        if (isset($slugs) && !$slugs->isEmpty()) {
            $maxNumber = 0;
            foreach ($slugs as $slug) {
                $pieces = explode($explodeString, $slug);
                $number = intval(end($pieces));
                if ($maxNumber < $number) {
                    $maxNumber = $number;
                }
            }
            $name .= $explodeString . ($maxNumber + 1);
        }
        return $name ?? '';
    }
    /** Update the Agency profile
     * @param Request $request
     */
    public function updateAgencyProfile(Request $request)
    {
        $userId = $this->getAuthUserId();
        $user = User::find($userId)->with('roles','agencies')->first();
        $agency =$user->agencies()->first();
        if (Hash::check($request->agency_data['password'], $user->password)) {
            $agencySlug = $this->checkUniqueSlug(['slug' => $request->agency_data['agency_slug'], 'id' => $agency->id]);
            $agency->name = $request->agency_data['agency_name'];
            $agency->slug = $agencySlug;
            $agency->email = $request->agency_data['agency_email'];
            $agency->phone_number = $request->agency_data['agency_phone_number'];
            $agency->address = $request->agency_data['agency_address'];
            $agency->save();
            $this->setApiSuccessMessage(trans('agency.update_profile'), $user);
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
