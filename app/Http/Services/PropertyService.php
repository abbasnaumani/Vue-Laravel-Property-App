<?php


namespace App\Http\Services;

use App\Http\Services\BaseService\BaseService;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PropertyService extends BaseService
{
    /**
     * Create property Validation Rules.
     * @param $request
     * @return mixed
     */
    public function propertyStoreValidation($request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'property_sub_type_id' => 'required',
            'area_unit_id' => 'required',
            'city_id' => 'required',
            'title' => 'required',
            'area' => 'required',
            'purpose' => 'required',
            'price' => 'required',
            'location' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->errorResponse(trans('auth.validation_failed'), ['errors' => $validator->errors()]);
        }
        return $this->successResponse(trans('auth.request_validated'));
    }

    /**
     * Create Property in Properties Table
     * @param Request $request
     * @return mixed
     */
    public function propertyStore(Request $request){
        $property = new Property;
        $property->user_id = $request->get('user_id');
        $property->property_sub_type_id = $request->get('property_sub_type_id');
        $property->area_unit_id = $request->get("area_unit_id");
        $property->city_id = $request->get('city_id');
        $property->title = $request->get('title');
        $property->area = $request->get('area');
        $property->purpose = $request->get('purpose');
        $property->price = $request->get('price');
        $property->location = $request->get('location');
        $isPropertySaved = $property->save();
        if(! $isPropertySaved) {
            return $this->errorResponse(trans('auth.property_not_added'), ['property' => $property]);
        }
        return $this->successResponse(trans('auth.property_added'), ['property' => $property]);
    }

    /**
     * Property Update Validation Rules.
     * @param $request
     * @return mixed
     */
    public function propertyUpdateValidation($request){
        $validator = Validator::make($request->all(), [
            'property_id' => 'required|exists:properties,id',
            'user_id' => 'required',
            'property_sub_type_id' => 'required',
            'area_unit_id' => 'required',
            'city_id' => 'required',
            'title' => 'required',
            'area' => 'required',
            'purpose' => 'required',
            'price' => 'required',
            'location' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->errorResponse(trans('auth.validation_failed'), ['errors' => $validator->errors()]);
        }
        return $this->successResponse(trans('auth.request_validated'));
    }

    /**
     * Update Property in Properties Table
     * @param Request $request
     * @return mixed
     */
    public function propertyUpdate(Request $request){
        $property = Property::find($request->property_id);
        $property->user_id = $request->get('user_id');
        $property->property_sub_type_id = $request->get('property_sub_type_id');
        $property->area_unit_id = $request->get("area_unit_id");
        $property->city_id = $request->get('city_id');
        $property->title = $request->get('title');
        $property->area = $request->get('area');
        $property->purpose = $request->get('purpose');
        $property->price = $request->get('price');
        $property->location = $request->get('location');
        $isPropertySaved = $property->save();
        if(! $isPropertySaved) {
            return $this->errorResponse(trans('auth.property_not_added'), ['property' => $property]);
        }
        return $this->successResponse(trans('auth.property_updated'), ['property' => $property]);
    }
}
