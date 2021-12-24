<?php

namespace App\Http\Requests\Property;

use Illuminate\Foundation\Http\FormRequest;


class StorePropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'property_sub_type_id' => 'required|exists:property_sub_types,id',
            'area_unit_id' => 'required|exists:area_units,id',
//            'city_id' => 'required|exists:cities,id',
            'title' => 'required|string|min:3|max:128',
            'area' => 'required|numeric',
            'purpose' => 'required',
            'price' => 'required|integer|min:0',
            'location_id' => 'required',
            'description' => 'required',
            'address' => 'required'
        ];
    }

}
