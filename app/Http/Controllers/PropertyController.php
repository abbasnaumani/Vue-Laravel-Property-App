<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Services\PropertyService;
class PropertyController extends Controller
{
    protected $propertyService;

    public function __construct(PropertyService $propertyService)
    {
        $this->propertyService = $propertyService;
    }

    /**
     * Give property data in response
     * @return mixed
     */
    public function show(Request $request){
        $propertyId = $request->property_id ?? 0;
        if(isset($propertyId) && !empty($propertyId)){
            $property = Property::find($propertyId);
            if(!isset($property) || empty($property)) return $this->error(trans('auth.not_found'), ['data'=>$property]);
        }else{
            $property = Property::all() ?? [];
        }
        return $this->success(trans('auth.data_retrieved'), ['data'=>$property]);
    }
    /**
     * Create Property Method.
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $validationResponse = $this->propertyService->propertyStoreValidation($request);
        if(isset($validationResponse['status']) && trim($validationResponse['status'] !== 'success')){
            return $this->error($validationResponse);
        }
        $response = $this->propertyService->propertyStore($request);
        if (isset($response['status']) && trim($response['status']) !== 'success') {
            return $this->error($response);
        }
        return $this->success($response);
    }
    /**
     * Property Update Method. That Update existing property.
     * @param Request $request
     * @return mixed
     */
    public function update(Request $request)
    {
        $validationResponse = $this->propertyService->propertyUpdateValidation($request);
        if(isset($validationResponse['status']) && trim($validationResponse['status'] !== 'success')){
            return $this->error($validationResponse);
        }
        $response = $this->propertyService->propertyUpdate($request);
        if (isset($response['status']) && trim($response['status']) !== 'success') {
            return $this->error($response);
        }
        return $this->success($response);
    }
    /**
     * delete Property record from properties table
     * @param $id
     * @return mixed
     */
    public function destroy($property_id){
        $propertyId = $property_id ?? 0;
        $property = Property::find($propertyId);
        if($property){
            $property->delete();
            return $this->success(trans('auth.property_delete'), ['data'=>$property]);
        }else{
            return $this->error("auth.not_found");
        }
    }
}
