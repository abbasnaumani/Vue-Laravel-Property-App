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
     *
     */
    public function getAllProperties()
    {
        $property = Property::with('propertyDetail','media', 'user', 'city','location.city', 'areaUnit', 'propertySubType')
            ->where('user_id', $this->getAuthUserId())->get();
        if ($property) {
            $this->setApiSuccessMessage(trans('property.properties_retrieved'), $property);
        } else {
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
                ->where('user_id', $this->getAuthUserId())->where('id', $id)->get();
            if ($property) {
                $this->setApiSuccessMessage(trans('generic.record_found'), $property);
            } else {
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
            'location_id' => 'required',
            'description' => 'required',
            'address' => 'required'
        ]);
        if ($validator->fails()) {
            $this->setApiErrorMessage(trans('property.validation_failed'), ['errors' => $validator->errors()]);
        } else {
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
            $property = Property::create($this->propertyData($request));
            $propertyDetail = $property->propertyDetail()->create($this->propertyDetailsData($request));

            $this->getAllProperties();
            $data = $this->getResponse()->payload;
            DB::commit();
            $this->setApiSuccessMessage(trans('property.property_store'), ['data'=>$data,'property_id'=>$property->id]);
        } catch (\Exception $e) {
            DB::rollback();
            $this->setApiErrorMessage(trans('property.property_not_store').$e->getMessage());
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
            'title' => 'required|string|min:3|max:128',
            'area' => 'required|numeric',
            'purpose' => 'required',
            'price' => 'required|integer|min:0',
            'location_id' => 'required',
            'description' => 'required',
            'address' => 'required'
        ]); // 'city_id' => 'required|exists:cities,id',
        if ($validator->fails()) {
            $this->setApiErrorMessage(trans('property.validation_failed'), ['errors' => $validator->errors()]);
        } else {
            $this->setApiSuccessMessage(trans('property.request_validated'));
        }
    }     //'property_id' => 'required|exists:properties,id',

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function propertyUpdate(Request $request, int $id)
    {
        DB::beginTransaction();
        try {
            if ($id) {
                $property = Property::where(['id' => $id, 'user_id' => $this->getAuthUserId()])->first();
                $property->update($this->propertyData($request));
                $propertyDetail = $property->propertyDetail()->first();
                $propertyDetail->update( $this->propertyDetailsData($request));

                $data = $this->getAllProperties();
                DB::commit();
                $this->setApiSuccessMessage(trans('property.property_updated'),$data);
            } else {
                $this->setApiErrorMessage(trans('property.property_not_found'));
            }
        } catch (\Exception $e) {
            DB::rollback();
            $this->setApiErrorMessage(trans('property.property_not_updated'), $e->getMessage());
        }
    }

    /**
     * Prepare Property Data for storing.
     * @param Request $request
     *
     * @return array
     */
    private function propertyData(Request $request): array
    {
        return [
            'user_id' => $this->getAuthUserId(),
            'property_sub_type_id' => $request->input('property_sub_type_id'),
            'area_unit_id' => $request->input("area_unit_id"),
            'city_id' => $request->input('city_id'),
            'title' => $request->input('title'),
            'area' => $request->input('area'),
            'purpose' => $request->input('purpose'),
            'price' => $request->input('price'),
            'location_id' => $request->input('location_id')
        ];

    }

    /**
     * Prepare Property Details Data for storing.
     * @param Request $request
     *
     * @return array
     */
    private function propertyDetailsData(Request $request): array
    {
        return [
            'description' => $request->input('description'),
            'address' => $request->input('address'),
            'bedrooms' => $request->input('bedrooms'),
            'bathrooms' => $request->input('bathrooms'),
            'is_occupancy_status' => $request->input('is_occupancy_status'),
            'is_installment_available' => $request->input('is_installment_available'),
            'is_possession_available' => $request->input('is_possession_available')
        ];

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy(int $id)
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
     * @return void
     */
    public function getPropertyTypes()
    {
        $propertyTypes = PropertySubType::with('propertyType')->get();
        $this->setApiSuccessMessage(trans('property.property_types_found'), $propertyTypes);
    }

    /**
     * Get all Area Units.
     *
     * @return void
     */
    public function getPropertyAreaUnits()
    {
        $areaUnits = AreaUnit::all();
        $this->setApiSuccessMessage(trans('property.area_units_found'), $areaUnits);
    }
}
