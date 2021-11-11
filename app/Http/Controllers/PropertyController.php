<?php

namespace App\Http\Controllers;

use App\Enums\ApiResponseEnum;
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
     * Give property data in response
     * @return JsonResponse
     */
    public function show(Request $request){
        $this->propertyService->show($request);
        return $this->getApiResponse();
    }
    /**
     * Create Property Method.
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
     * Property Update Method. That Update existing property.
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request)
    {
        $this->propertyService->propertyUpdateValidation($request);
        if(isset($this->getResponse()->status) && trim($this->getResponse()->status == ApiResponseEnum::SUCCESS_RESPONSE))
            $this->propertyService->propertyUpdate($request);
        return $this->getApiResponse();
    }
    /**
     * delete Property record from properties table
     * @param $property_id
     * @return JsonResponse
     */
    public function destroy($property_id){
        $this->propertyService->destroy($property_id);
        return $this->getApiResponse();
    }
}
