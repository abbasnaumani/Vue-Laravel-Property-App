<?php

namespace App\Http\Controllers;

use App\Http\Requests\Subscribe\SubscribeRequest;
use App\Services\SubscribeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    protected $subscribeService;
    /**
     * Initialize  Subscribe Service in Constructor.
     *
     */
    public function __construct(SubscribeService $subscribeService)
    {
        $this->subscribeService = $subscribeService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $this->subscribeService->getAllSubscribers();
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
     * @param  SubscribeRequest  $request
     * @return JsonResponse
     */
    public function store(SubscribeRequest $request): JsonResponse
    {
        $this->subscribeService->subscribeStore($request);
        return $this->getApiResponse();
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
