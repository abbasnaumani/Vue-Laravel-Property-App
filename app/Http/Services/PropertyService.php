<?php


namespace App\Http\Services;

use App\Http\Services\BaseService\BaseService;
use App\Models\Property;
use App\Models\PropertyDetail;
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
            'user_id' => 'required|exists:users,id',
            'property_sub_type_id' => 'required|exists:property_sub_types,id',
            'area_unit_id' => 'required|exists:area_units,id',
            'city_id' => 'required|exists:cities,id',
            'title' => 'required|string|min:3|max:128',
            'area' => 'required|numeric',
            'purpose' => 'required',
            'price' => 'required|integer|min:0',
            'location' => 'required|string',
            'description' => 'required',
            'address' => 'required'
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
        if($property->save()){
            $propertyDetail = new PropertyDetail;
            $propertyDetail->property_id = $property->id;
            $propertyDetail->description = $request->get('description') ?? "";
            $propertyDetail->address = $request->get('address') ?? "";
            $propertyDetail->bedrooms = $request->get('bedrooms') ?? 0;
            $propertyDetail->bathrooms = $request->get('bathrooms') ?? 0;
            $propertyDetail->is_occupancy_status = $request->get('is_occupancy_status') ?? 0;
            $propertyDetail->is_installment_available = $request->get('is_installment_available') ?? 0;
            $propertyDetail->is_possession_available = $request->get('is_possession_available') ?? 0;
            $propertyDetailStore = $propertyDetail->save();
            if(! $propertyDetailStore){
                return $this->errorResponse(trans('auth.property_detail_not_store'), ['property' => $property]);
            }
        }else {
            return $this->errorResponse(trans('auth.property_not_store'), ['property' => $property]);
        }

        return $this->successResponse(trans('auth.property_store'), ['property' => $property]);
    }

    /**
     * Property Update Validation Rules.
     * @param $request
     * @return mixed
     */
    public function propertyUpdateValidation($request){
        $validator = Validator::make($request->all(), [
            'property_id' => 'required|exists:properties,id',
            'user_id' => 'required|exists:users,id',
            'property_sub_type_id' => 'required|exists:property_sub_types,id',
            'area_unit_id' => 'required|exists:area_units,id',
            'city_id' => 'required|exists:cities,id',
            'title' => 'required|string|min:3|max:128',
            'area' => 'required|numeric',
            'purpose' => 'required',
            'price' => 'required|integer|min:0',
            'location' => 'required|string'
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
        $propertyId = $request->property_id ?? 0;
        $property = Property::find($propertyId);
        $property->user_id = $request->get('user_id');
        $property->property_sub_type_id = $request->get('property_sub_type_id');
        $property->area_unit_id = $request->get("area_unit_id");
        $property->city_id = $request->get('city_id');
        $property->title = $request->get('title') ?? "";
        $property->area = $request->get('area') ?? 0;
        $property->purpose = $request->get('purpose');
        $property->price = $request->get('price') ?? 0;
        $property->location = $request->get('location') ?? "";
        $isPropertySaved = $property->save();
        if(! $isPropertySaved) {
            return $this->errorResponse(trans('auth.property_not_added'), ['property' => $property]);
        }
        return $this->successRpropertyUpdateesponse(trans('auth.property_updated'), ['property' => $property]);
    }
}
