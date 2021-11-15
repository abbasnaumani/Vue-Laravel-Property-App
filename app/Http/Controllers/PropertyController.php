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
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index($id){
        $this->propertyService->getAllProperties($id);
        return $this->getApiResponse();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id){
        $this->propertyService->getProperty($id);
        return $this->getApiResponse();
    }
    /**
     * Store a newly created resource in storage.
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
     * Get the data for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->propertyService->getProperty($id);
        return $this->getApiResponse();
    }
    /**
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id){
        $this->propertyService->destroy($id);
        return $this->getApiResponse();
    }
}
