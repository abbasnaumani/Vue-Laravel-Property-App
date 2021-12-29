<?php

namespace App\Http\Controllers;

use App\Http\Requests\Agency\AgencyProfileRequest;
use App\Http\Requests\Agency\AgencyStoreRequest;
use App\Http\Requests\Agency\AgencyUpdateRequest;
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
     * Get All Agencies and their users.
     *
     * @return JsonResponse
     */
    public function getAgencyList(): JsonResponse
    {
        $agencies = Agency::with('users.roles')->get();
        $this->setApiSuccessMessage(trans('agency.agency_found'), $agencies);
        return $this->getApiResponse();
    }
    /**
     * Display a listing of the Agency users
     * @param int $id
     * @return JsonResponse
     */
    public function getAgencyUsers( $id): JsonResponse
    {
        $agency = Agency::find($id);
        $users = ($agency) ? $agency->users()->with('roles')->get() : null;
        $this->setApiSuccessMessage(trans('agency.agency_user_list'), $users);
        return $this->getApiResponse();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  AgencyStoreRequest  $request
     * @return JsonResponse
     */
    public function store(AgencyStoreRequest $request): JsonResponse
    {
        $this->agencyService->addAgency($request);
        return $this->getApiResponse();
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return JsonResponse
     */
    public function getAgencyBySlug(string $slug): JsonResponse
    {
        $agency = Agency::where('slug',$slug)->get();
        $this->setApiSuccessMessage(trans('agency.agency_found'), $agency);
        return $this->getApiResponse();
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
     * @param AgencyUpdateRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(AgencyUpdateRequest $request,int $id): JsonResponse
    {
        $this->agencyService->updateAgency($request,$id);
        return $this->getApiResponse();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param AgencyProfileRequest $request
     * @return JsonResponse
     */
    public function updateProfile(AgencyProfileRequest $request): JsonResponse
    {
        $this->agencyService->updateAgencyProfile($request);
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
        $user = Agency::find($id);
        $user->delete();
        $this->setApiSuccessMessage(trans('agency.agency_delete'));
        return $this->getApiResponse();
    }
}
