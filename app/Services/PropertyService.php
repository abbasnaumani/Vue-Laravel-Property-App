<?php


namespace App\Services;

use App\Models\Agency;
use App\Models\AreaUnit;
use App\Models\PropertySubType;
use App\Services\BaseService\BaseService;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyService extends BaseService
{
    protected $properties;
    /**
     * Get All Properties
     * @param string $slug
     */
//    public function getPropertyListBySlug(Request $request,string $slug)
//    {
//        $agency = Agency::where('slug', $slug)->first();
//        $agencyUsers = $agency->users ?? null;
//        if ($agencyUsers) {
//            $agencyUserIds = array_column($agencyUsers->toArray(), 'id');
//            if ($agencyUserIds) {
//                $properties = Property::with('propertyDetail','propertyFeature', 'media', 'user', 'location.city', 'areaUnit', 'propertySubType')
//                ->whereIn('user_id', $agencyUserIds)->orderBy('id')->simplePaginate((int)$request->per_page + $request->add_more, ['*'],'page',(int)$request->current_page);            // limit and offset
//                $this->setApiSuccessMessage(trans('property.properties_retrieved'), $properties ?? null);
//            }
//        }
//    }
    public function getPropertyListBySlug(Request $request, string $slug)
    {
//        dd($request->all());
        try {
            $agency = Agency::where('slug', $slug)->firstOrFail();
            $agencyUsers = $agency->users ?? null;
            if ($agencyUsers) {
                $agencyUserIds = array_column($agencyUsers->toArray(), 'id');
                if ($agencyUserIds) {
                    $this->properties = Property::with('propertyDetail', 'propertyFeature', 'media', 'user', 'location.city', 'areaUnit', 'propertySubType');
                    $this->applyPropertyFilters($request);
                    $properties = $this->properties->whereIn('user_id', $agencyUserIds)
                        ->orderBy('id')->simplePaginate((int)$request->per_page + $request->add_more, ['*'], 'page', (int)$request->current_page);            // limit and offset
                    $this->setApiSuccessMessage(trans('property.properties_retrieved'), $properties ?? null);
                }
            }
        } catch (\Exception $e) {
            $this->setApiErrorMessage(trans('property.page_not_found'));
        }
    }

    /**
     * Apply Property Filters
     * @param
     */
    public function applyPropertyFilters($request)
    {
        if (isset($request->location_id) && !empty($request->location_id)) {
            $this->properties = $this->properties->where(['location_id' => $request->location_id]);
        }
        if (isset($request->type_id) && !empty($request->type_id)) {
            $this->properties = $this->properties->where(['property_sub_type_id' => $request->type_id]);
        }
        if (isset($request->beds) && intval($request->beds) > 0) {
            $this->properties = $this->properties->whereHas('propertyDetail', function ($query) use ($request) {
                $query->where('bedrooms', '>=', $request->beds);
            });
        }
        if (isset($request->min_price) && isset($request->max_price)) {
            $this->properties = $this->properties->whereBetween('price', [$request->min_price, $request->max_price]);
        }
    }

    /**
     * Get All User Properties of Agency
     * @param int $agencyId
     */
    public function getUserPropertyList(int $agencyId = 1)
    {
        $user = $this->getAuthUser();
        $agency = $user->agencies()->first();
//        $agency = Agency::find($agencyId);
        $agencyUsers = $agency->users ?? null;

        if ($agencyUsers) {
            $agencyUserIds = array_column($agencyUsers->toArray(), 'id');
            if ($agencyUserIds) {
                $properties = Property::with('propertyDetail', 'propertyFeature', 'media', 'user', 'location.city', 'areaUnit', 'propertySubType')
                    ->whereIn('user_id', $agencyUserIds)->get();
//                dd($properties);
                $this->setApiSuccessMessage(trans('property.properties_retrieved'), $properties ?? null);
            }
        }


    }

    /**
     * Display a listing of the resource.
     * @param int $id
     */
    public function getPropertyById(int $id)
    {
        $property = Property::with('propertyDetail' ,'propertyFeature', 'media', 'user', 'location.city', 'areaUnit', 'propertySubType.propertyType')
            ->where('id', $id)->first();
        $this->setApiSuccessMessage(trans('generic.record_found'), $property);
    }

    /**
     * Display a listing of the resource.
     * @param int $id
     */
    public function getProperty(int $id)
    {
        $property = Property::with('propertyDetail', 'propertyFeature', 'media', 'user', 'location.city', 'areaUnit', 'propertySubType')
            ->where('user_id', $this->getAuthUserId())->where('id', $id)->get();
        $this->setApiSuccessMessage(trans('generic.record_found'), $property);
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
            $property->propertyDetail()->create($this->propertyDetailsData($request));
            $property->propertyFeature()->create($this->propertyFeaturesData($request));
            DB::commit();
            $this->setApiSuccessMessage(trans('property.property_store'), ['property_id' => $property->id]);
        } catch (\Exception $e) {
            DB::rollback();
            $this->setApiErrorMessage(trans('property.property_not_store'));
        }
    }

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
            $property = Property::where(['id' => $id, 'user_id' => $request->input('user_id')])->firstOrFail();
            $property->update($this->propertyData($request));
            $propertyDetail = $property->propertyDetail()->first();
            $propertyDetail->update($this->propertyDetailsData($request));

//            $propertyFeature = $property->propertyFeature()->first();
//            $propertyFeature->update($this->propertyFeaturesData($request));
            DB::commit();
            $this->setApiSuccessMessage(trans('property.property_updated'), ['property_id' => $id]);
        } catch (\Exception $e) {
            DB::rollback();
            $this->setApiErrorMessage(trans('property.property_not_updated').$e->getMessage());
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
            'user_id' => $request->input('user_id'),
            'property_sub_type_id' => $request->input('property_sub_type_id'),
            'area_unit_id' => $request->input("area_unit_id"),
            'city_id' => $request->input('city_id'),
            'title' => $request->input('title'),
            'area' => $request->input('area'),
            'purpose' => $request->input('purpose'),
            'price' => $request->input('price'),
            'location_id' => $request->input('location_id'),
            'is_featured' => 0
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
            'bedrooms' =>  $request->input('bedrooms') ?? 0,
            'bathrooms' => $request->input('bathrooms') ?? 0,
            'is_occupancy_status' => $request->input('is_occupancy_status'),
            'is_installment_available' => $request->input('is_installment_available'),
            'is_possession_available' => $request->input('is_possession_available')
        ];
    }

    /**
     * Prepare Property Features Data for storing.
     * @param Request $request
     *
     * @return array
     */
    private function propertyFeaturesData(Request $request): array
    {
        return [
            'is_central_air_conditioning' => $request->input('is_central_air_conditioning'),
            'is_central_heating' => $request->input('is_central_heating'),
            'is_furnished' => $request->input('is_furnished'),
            'other_facilities' => $request->input('other_facilities'),
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
        $property->delete();
        $this->setApiSuccessMessage(trans('property.property_delete'));
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
