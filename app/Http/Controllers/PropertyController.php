<?php

namespace App\Http\Controllers;

use App\Enums\ApiResponseEnum;
use App\Models\Location;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Services\PropertyService;
class PropertyController extends Controller
{
    protected $propertyService;

    public function __construct(PropertyService $propertyService)
    {
        $this->propertyService = $propertyService;
    }
    /**
     * Display a listing of the property.
     *
     * @return JsonResponse
     */
    public function index(){
        $this->propertyService->getAllProperties();
        return $this->getApiResponse();
    }

    /**
     * Display the specified property.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id){
        $this->propertyService->getProperty($id);
        return $this->getApiResponse();
    }
    /**
     * Store a newly created property in storage.
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $this->propertyService->propertyStoreValidation($request);
        if(isset($this->getResponse()->status) && trim($this->getResponse()->status == ApiResponseEnum::SUCCESS_RESPONSE)) {
                $this->propertyService->propertyStore($request);
        }
        return $this->getApiResponse();
    }

    /**
     * Update the specified property in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request,$id)
    {
        $this->propertyService->propertyUpdateValidation($request);
        if(isset($this->getResponse()->status) && trim($this->getResponse()->status == ApiResponseEnum::SUCCESS_RESPONSE))
            $this->propertyService->propertyUpdate($request,$id);
        return $this->getApiResponse();
    }
    /**
     * Remove the specified property from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id){
        $this->propertyService->destroy($id);
        return $this->getApiResponse();
    }
    /**
     * Get all Property Types.
     *
     * @return JsonResponse
     */
    public function getPropertyTypes(){
        $this->propertyService->getPropertyTypes();
        return $this->getApiResponse();
    }
    /**
     * Get all Property Area Units.
     *
     * @return JsonResponse
     */
    public function getPropertyAreaUnits(){
        $this->propertyService->getPropertyAreaUnits();
        return $this->getApiResponse();
    }
    public function getPropertyLocationsByCity($cityId){
        $locations = Location::where('city_id',$cityId)->get();
        $this->setApiSuccessMessage("", $locations);
        return $this->getApiResponse();


    }
}
