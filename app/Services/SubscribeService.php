<?php

namespace App\Services;

use App\Models\Agency;
use App\Models\Subscribe;
use App\Services\BaseService\BaseService;
use Illuminate\Http\Request;
use DB;
use Exception;

class SubscribeService extends BaseService
{
    /**
     * Get All Subscribers
     */
    public function getAllSubscribers(){
        $subscribers = Subscribe::all();
        $this->setApiSuccessMessage(trans('subscribe.subscribe_found'),['subscribers'=>$subscribers]);
    }
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return void
     */
    public function subscribeStore(Request $request)
    {
        DB::beginTransaction();
        try {
            $agency = Agency::where('slug',$request->slug)->first();
            $subscription = Subscribe::firstOrNew(['email' => $request->email]);
            $subscription->agency_id = $agency->id;
            $subscription->name = $request->name;
            $subscription->email = $request->email;
            $subscription->save();

            DB::commit();
            $this->setApiSuccessMessage(trans('subscribe.subscribe_store'));
        } catch (\Exception $e) {
            DB::rollback();
            $this->setApiErrorMessage(trans('subscribe.subscribe_failed'));
        }
    }
}
