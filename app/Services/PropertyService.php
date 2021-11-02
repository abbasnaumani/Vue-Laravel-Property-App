<?php


namespace App\Http\Services;

use App\Http\Services\BaseService\BaseService;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyService extends BaseService
{
    /**
     * Create or Update Property in Properties Table
     */
    public function propertyAddUpdate(Request $request){
        $property = Property::updateOrCreate([
            //Add unique field combo to match here
            'id'   => $request->get('property_id'),
        ],[
            'user_id'     => $request->get('user_id'),
            'property_sub_type_id' => $request->get('property_sub_type_id'),
            'area_unit_id'    => $request->get("area_unit_id"),
            'city_id'   => $request->get('city_id'),
            'title'       => $request->get('title'),
            'area'   => $request->get('area'),
            'purpose'    => $request->get('purpose'),
            'price'    => $request->get('price'),
            'location'    => $request->get('location')
        ]);
        if(!$property->wasRecentlyCreated && $property->wasChanged()){
            // updateOrCreate performed an update
            return $this->successResponse(trans('auth.property_updated'), ['property' => $property]);
        }
        if(!$property->wasRecentlyCreated && !$property->wasChanged()){
            // updateOrCreate performed nothing, row did not change
            return $this->errorResponse(trans('auth.property_not_added'), ['property' => $property]);
        }
        if($property->wasRecentlyCreated){
            // updateOrCreate performed create
            return $this->successResponse(trans('auth.property_added'), ['property' => $property]);
        }
    }
}
