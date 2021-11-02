<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Services\PropertyService;
use Illuminate\Support\Facades\Validator;
class PropertyController extends Controller
{
    protected $propertyService;

    public function __construct(PropertyService $propertyService)
    {
        $this->propertyService = $propertyService;
    }

    /**
     * Give all property data in response
     * @return mixed
     */
    public function listProperty(){
        $properties = Property::all();
        return $this->success("Data Retrieved Successfully", ['data'=>$properties]);
    }
    public function store(Request $request){

        $validationResponse = $this->propertyService->propertyValidation($request);
//        dd($validationResponse,$validationResponse['status'],isset($validationResponse['status'] && trim($validationResponse['status'] == 'success'));
        if($validationResponse['status']){

        }
        $response = $this->propertyService->propertyAddUpdate($request);
        if (isset($response['status']) && trim($response['status']) == 'success') {
            return $this->success($response);
        }else{
            return $this->error($response);
        }
    }
    /**
     * Create or Update Property in Properties Table
     * @param Request $request
     * @return mixed
     */
    public function propertyAddUpdate(Request $request){
        $validator = Validator::make($request->all(), [
            'is_update' => 'required|bool',
            'property_id' => 'required_if:is_update,1|exists:properties,id',
            'user_id' => 'required',
            'property_sub_type_id' => 'required',
            'area_unit_id' => 'required',
            'city_id' => 'required',
            'title' => 'required',
            'area' => 'required',
            'purpose' => 'required',
            'price' => 'required',
            'location' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->errorResponse(trans('auth.validation_failed'), ['errors' => $validator->errors()]);
        }
        $response = $this->propertyService->propertyAddUpdate($request);
        if (isset($response['status']) && trim($response['status']) == 'success') {
            return $this->successResponse($response);
        }else{
            return $this->errorResponse($response);
        }
    }

    /**
     * delete Property record from properties table
     * @param $id
     * @return mixed
     */
    public function deleteProperty($id){
        $propertyId = $id ?? 0;
        $property = Property::find($propertyId);
        if($property){
            $property->delete();
            return $this->successResponse(trans('auth.property_delete'), ['data'=>$property]);
        }else{
            return $this->errorResponse("Property Not Available.");
        }
    }
    public function test(){
        $property = Property::all();
        dd($property,$property->toArray());
    }
}
