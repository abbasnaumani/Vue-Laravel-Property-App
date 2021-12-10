<?php

namespace App\Http\Controllers;

use App\Http\Requests\Agency\AgencyProfileRequest;
use App\Models\Agency;
use App\Services\AgencyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    protected $agencyService;
    /**
     * Initialize the user service in constructor
     * @param AgencyService $agencyService
     */
    public function __construct(AgencyService $agencyService)
    {
        $this->agencyService = $agencyService;
    }
    /**
     * Get all agency users by agency slug.
     * @param string $slug
     * @return JsonResponse
     */
    public function getAgencyUsersBySlug(string $slug): JsonResponse
    {
        $this->agencyService->getAgencyUsersBySlug($slug);
        return $this->getApiResponse();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function edit(int $id): JsonResponse
    {
        $agency = Agency::find($id);
        $this->setApiSuccessMessage(trans('agency.agency_found'), $agency);
        return $this->getApiResponse();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AgencyProfileRequest $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(AgencyProfileRequest $request, int $id): JsonResponse
    {
        $this->agencyService->updateAgencyProfile($request,$id);
        return $this->getApiResponse();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
