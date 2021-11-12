<?php


namespace App\Services;

use App\Services\BaseService\BaseService;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PropertyService extends BaseService
{
    public function show(Request $request){
        $propertyId = $request->property_id ?? 0;
        if(isset($propertyId) && !empty($propertyId)){
            $property = Property::find($propertyId);
            if($property==null || empty($property)){
                $this->setApiErrorMessage(trans('property.properties_not_retrieved'), ['data'=>$property]);
                return ;
            }
        }else{
            $property = Property::with('propertyDetail','user','city','areaUnit','propertySubType')->where('user_id',$this->getAuthUserId())->get();
        }
        $this->setApiSuccessMessage(trans('property.properties_retrieved'),$property);
    }
    /**
     * Create property Validation Rules.
     * @param $request
     * @return void
     */
    public function propertyStoreValidation($request){
        $validator = Validator::make($request->all(), [
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
            $this->setApiErrorMessage(trans('property.validation_failed'), ['errors' => $validator->errors()]);
            return;
        }
        $this->setApiSuccessMessage(trans('property.request_validated'));
    }

    /**
     * Create Property in Properties Table
     * @param Request $request
     * @return void
     */
    public function propertyStore(Request $request)
    {
//        $user = $this->getAuthUser();
//        if($user){
//
//        }
        DB::beginTransaction();
        try {
            $propertyData = [
                'user_id' => $this->getAuthUserId(),
                'property_sub_type_id' => $request->input('property_sub_type_id'),
                'area_unit_id' => $request->input("area_unit_id"),
                'city_id' => $request->input('city_id'),
                'title' => $request->input('title'),
                'area' => $request->input('area'),
                'purpose' => $request->input('purpose'),
                'price' => $request->input('price'),
                'location' => $request->input('location')
            ];
            $propertyDetailData = [
                'description' => $request->input('description') ?? "",
                'address' => $request->input('address') ?? "",
                'bedrooms' => $request->input('bedrooms') ?? 0,
                'bathrooms' => $request->input('bathrooms') ?? 0,
                'is_occupancy_status' => $request->input('is_occupancy_status') ?? 0,
                'is_installment_available' => $request->input('is_installment_available') ?? 0,
                'is_possession_available' => $request->input('is_possession_available') ?? 0
            ];
            $property= Property::create($propertyData);
            $propertyDetail = $property->propertyDetail()->create($propertyDetailData);
            $data = [ 'property' =>$property, 'property_detail' =>$propertyDetail ];
            DB::commit();
            $this->setApiSuccessMessage(trans('property.property_store'), ['data' => $data]);
        } catch (\Exception $e) {
            DB::rollback();
            $this->setApiErrorMessage(trans('property.property_not_store'));
        }
    }

    /**
     * Property Update Validation Rules.
     * @param $request
     * @return void
     */
    public function propertyUpdateValidation($request){
        $validator = Validator::make($request->all(), [
            'property_id' => 'required|exists:properties,id',
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
            $this->setApiErrorMessage(trans('property.validation_failed'), ['errors' => $validator->errors()]);
            return ;
        }
        $this->setApiSuccessMessage(trans('property.request_validated'));
    }

    /**
     * Update Property in Properties Table
     * @param Request $request
     * @return void
     */
    public function propertyUpdate(Request $request){
        DB::beginTransaction();
        try {
            $propertyId = $request->property_id ?? 0;
            $propertyData = [
                'property_sub_type_id' => $request->input('property_sub_type_id'),
                'area_unit_id' => $request->input("area_unit_id"),
                'city_id' => $request->input('city_id'),
                'title' => $request->input('title') ?? "",
                'area' => $request->input('area') ?? 0,
                'purpose' => $request->input('purpose'),
                'price' => $request->input('price') ?? 0,
                'location' => $request->input('location') ?? ""
            ];
            $propertyDetailData = [
                'description' => $request->input('description') ?? "",
                'address' => $request->input('address') ?? "",
                'bedrooms' => $request->input('bedrooms') ?? 0,
                'bathrooms' => $request->input('bathrooms') ?? 0,
                'is_occupancy_status' => $request->input('is_occupancy_status') ?? 0,
                'is_installment_available' => $request->input('is_installment_available') ?? 0,
                'is_possession_available' => $request->input('is_possession_available') ?? 0,
            ];
            $property = Property::where(['id'=>$propertyId,'user_id'=> $request->input('user_id')])->update($propertyData);
            $propertyDetail = $property->propertyDetail()->update($propertyDetailData);
            $data = ['property'=>$property,'propertyDetail'=>$propertyDetail];
            DB::commit();
            $this->setApiSuccessMessage(trans('property.property_updated'), ['data' => $data]);
        } catch (\Exception $e) {
            DB::rollback();
            $this->setApiErrorMessage(trans('property.property_not_updated'));
        }
    }
    /**
     * delete Property record from properties table
     * @param $property_id
     * @return void
     */
    public function destroy($property_id){
        $propertyId = $property_id ?? 0;
        $property = Property::find($propertyId);
        if($property){
            $property->delete();
            $this->setApiSuccessMessage(trans('property.property_delete'), ['data'=>$property]);
        }else{
            $this->setApiErrorMessage(trans("property.property_not_found"));
        }
    }
}
