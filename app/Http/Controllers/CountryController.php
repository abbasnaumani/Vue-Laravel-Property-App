<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Location;

class CountryController extends Controller
{
    /**
     * Display a listing of the cities of country.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllCities()
    {
        $cities = City::all();
        $this->setApiSuccessMessage(trans('country.cities_found'), $cities);
        return $this->getApiResponse();
    }
    public function getAllLocationsByCItyId($cityId){
        $locations = Location::where('city_id',$cityId)->get();
        $this->setApiSuccessMessage("", $locations);
        return $this->getApiResponse();


    }

}
