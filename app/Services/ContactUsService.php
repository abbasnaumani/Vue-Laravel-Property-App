<?php

namespace App\Services;

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
        $contactUs = ContactUs::all();
        $this->setApiSuccessMessage(trans('contactus.contactus_found'),['contact_us'=>$contactUs]);
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
            $contactUs = new ContactUs();
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
