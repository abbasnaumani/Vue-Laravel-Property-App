<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUs\ContactUsRequest;
use App\Models\ContactUs;
use App\Services\ContactUsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    protected $contactUsService;
    /**
     * Initialize  Subscribe Service in Constructor.
     *
     */
    public function __construct(ContactUsService $contactUsService)
    {
        $this->contactUsService = $contactUsService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $this->contactUsService->getAllContactUSList();
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
     * @param  ContactUsRequest  $request
     * @return JsonResponse
     */
    public function store(ContactUsRequest $request): JsonResponse
    {
        $this->contactUsService->storeContactUs($request);
        return $this->getApiResponse();
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return JsonResponse
     */
    public function getContactUsDataByAgencySlug(string $slug): JsonResponse
    {
        $this->contactUsService->getContactUsDataByAgencySlug($slug);
        return $this->getApiResponse();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $contactUs = ContactUs::find($id);
        $contactUs->delete();
        $this->setApiSuccessMessage(trans('contactus.contactus_delete'));
        return $this->getApiResponse();
    }
}
