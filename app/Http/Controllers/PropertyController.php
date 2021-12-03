<?php

namespace App\Http\Controllers;

use App\Enums\ApiResponseEnum;
use App\Http\Requests\Property\StorePropertyRequest;
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
    public function index(): JsonResponse
    {
        $this->propertyService->getAllProperties();
        return $this->getApiResponse();
    }

    /**
     * Display the specified property.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $this->propertyService->getProperty($id);
        return $this->getApiResponse();
    }
    /**
     * Store a newly created property in storage.
     * @param StorePropertyRequest $request
     * @return JsonResponse
     */
    public function store(StorePropertyRequest $request): JsonResponse
    {
        /*$this->propertyService->propertyStoreValidation($request);
        if(isset($this->getResponse()->status) && trim($this->getResponse()->status == ApiResponseEnum::SUCCESS_RESPONSE)) {

        }*/
        $this->propertyService->propertyStore($request);
        return $this->getApiResponse();
    }

    /**
     * Update the specified property in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $this->propertyService->propertyUpdateValidation($request);
        if(isset($this->getResponse()->status) && trim($this->getResponse()->status == ApiResponseEnum::SUCCESS_RESPONSE))
            $this->propertyService->propertyUpdate($request,$id);
        return $this->getApiResponse();
    }
    /**
     * Remove the specified property from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $this->propertyService->destroy($id);
        return $this->getApiResponse();
    }
    /**
     * Get all Property Types.
     *
     * @return JsonResponse
     */
    public function getPropertyTypes(): JsonResponse
    {
        $this->propertyService->getPropertyTypes();
        return $this->getApiResponse();
    }
    /**
     * Get all Property Area Units.
     *
     * @return JsonResponse
     */
    public function getPropertyAreaUnits(): JsonResponse
    {
        $this->propertyService->getPropertyAreaUnits();
        return $this->getApiResponse();
    }
}
