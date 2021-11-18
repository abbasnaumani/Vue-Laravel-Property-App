<?php


namespace App\Services;

use App\Models\AreaUnit;
use App\Models\PropertyDetail;
use App\Models\PropertySubType;
use App\Services\BaseService\BaseService;
use App\Models\Property;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PropertyService extends BaseService
{
    /**
     * Give All Properties
     * @return JsonResponse
     */
    public function getAllProperties(){
        $property = Property::with( 'propertyDetail','user', 'city', 'areaUnit', 'propertySubType')
            ->where('user_id', $this->getAuthUserId())->get();
        if($property){
            $this->setApiSuccessMessage(trans('property.properties_retrieved'), $property);
        }else{
            $this->setApiErrorMessage(trans('property.property_not_found'));
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function getProperty($id)
    {
        if ($id) {
            $property = Property::with('propertyDetail', 'user', 'city', 'areaUnit', 'propertySubType')
                ->where('user_id', $this->getAuthUserId())->where('id',$id)->get();
            if ($property) {
                $this->setApiSuccessMessage(trans('generic.record_found'), $property);
            }else{
                $this->setApiErrorMessage(trans('generic.record_not_found'));
            }
        }
    }

    /**
     * Create property Validation Rules.
     * @param $request
     * @return void
     */
    public function propertyStoreValidation($request)
    {
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
        }else{
            $this->setApiSuccessMessage(trans('property.request_validated'));
        }
    }
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return void
     */
    public function propertyStore(Request $request)
    {
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
                'description' => $request->input('description'),
                'address' => $request->input('address'),
                'bedrooms' => $request->input('bedrooms'),
                'bathrooms' => $request->input('bathrooms'),
                'is_occupancy_status' => $request->input('occupancy_status'),
                'is_installment_available' => $request->input('installment_available'),
                'is_possession_available' => $request->input('possession_available')
            ];
            $property = Property::create($propertyData);
            $propertyDetail = $property->propertyDetail()->create($propertyDetailData);
//            $data = ['property' => $property, 'property_detail' => $propertyDetail];
            $data = $this->getAllProperties();
            DB::commit();
            $this->setApiSuccessMessage(trans('property.property_store'),$data);
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
    public function propertyUpdateValidation(Request $request)
    {
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
        }
        else{
            $this->setApiSuccessMessage(trans('property.request_validated'));
        }
    }     //'property_id' => 'required|exists:properties,id',

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return void
     */
    public function propertyUpdate(Request $request,$id)
    {
        DB::beginTransaction();
        try {
            if($id) {
                $propertyData = [
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
                    'description' => $request->input('description'),
                    'address' => $request->input('address'),
                    'bedrooms' => $request->input('bedrooms'),
                    'bathrooms' => $request->input('bathrooms'),
                    'is_occupancy_status' => $request->input('is_occupancy_status'),
                    'is_installment_available' => $request->input('is_installment_available'),
                    'is_possession_available' => $request->input('is_possession_available'),
                ];

                $property = Property::where(['id' => $id, 'user_id' => $this->getAuthUserId()])->update($propertyData);
                $propertyDetail = $property->propertyDetail()->update($propertyDetailData);

                //              $data = ['property' => $property, 'propertyDetail' => $propertyDetail];

                $data = $this->getAllProperties();
                DB::commit();
                $this->setApiSuccessMessage(trans('property.property_updated'), $data);
            }else{
                $this->setApiErrorMessage(trans('property.property_not_found'));
            }
        } catch (\Exception $e) {
            DB::rollback();
            $this->setApiErrorMessage(trans('property.property_not_updated'),$e->getMessage());
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return void
     */
    public function destroy($id)
    {
        $property = Property::find($id);
        if ($property) {
            $property->delete();
            $this->setApiSuccessMessage(trans('property.property_delete'));
        } else {
            $this->setApiErrorMessage(trans("property.property_not_found"));
        }
    }
    /**
     * Get all Property Types.
     *
     * @return JsonResponse
     */
    public function getPropertyTypes(){
        $propertyTypes = PropertySubType::with('propertyType')->get();
        $this->setApiSuccessMessage(trans('property.property_types_found'), $propertyTypes);
    }
    /**
     * Get all Area Units.
     *
     * @return JsonResponse
     */
    public function getPropertyAreaUnits(){
        $areaUnits = AreaUnit::all();
        $this->setApiSuccessMessage(trans('property.area_units_found'), $areaUnits);
    }
}
