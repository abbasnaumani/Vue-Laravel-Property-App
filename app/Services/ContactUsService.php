<?php

namespace App\Services;

use App\Models\Agency;
use App\Models\ContactUs;
use App\Services\BaseService\BaseService;
use Illuminate\Http\Request;
use DB;
use Exception;

class ContactUsService extends BaseService
{
    /**
     * Get All Subscribers
     */
    public function getAllContactUSList(){
        $contactUs = ContactUs::with('agency')->get();
        $this->setApiSuccessMessage(trans('contactus.contactus_found'),$contactUs);
    }
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return void
     */
    public function storeContactUs(Request $request)
    {
        DB::beginTransaction();
        try {
            $agency = Agency::where('slug',$request->slug)->first();
            $contactUs = new ContactUs();
            $contactUs->agency_id = $agency->id;
            $contactUs->name = $request->name;
            $contactUs->email = $request->email;
            $contactUs->message = $request->message;
            $contactUs->phone_number = $request->phone_number;
            $contactUs->save();

            DB::commit();
            $this->setApiSuccessMessage(trans('contactus.contactus_store'));
        } catch (\Exception $e) {
            DB::rollback();
            $this->setApiErrorMessage(trans('contactus.contactus_failed'));
        }
    }
}
