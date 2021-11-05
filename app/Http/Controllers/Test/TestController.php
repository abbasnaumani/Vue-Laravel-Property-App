<?php

namespace App\Http\Controllers\Test;

use App\Helpers\ApiResponseHelper;
use App\Http\Controllers\Controller;
use App\Services\TestService;
use Illuminate\Http\Request;

class TestController extends Controller
{
    private $testService;

    public function __construct(TestService $testService)
    {
        $this->testService = $testService;
        //   $this->middleware('auth');
    }

    public function testMethod(Request $request)
    {
        $requestData = $request->toArray();
        $value = $requestData['test_method'] ?? 'testResponse';
        switch ($value) {
            case 'testResponse':
                return $this->testResponse();
                break;
            default:
                return $this->$value($request);
        }
    }

    /**
     * Testing Response
     *
     */
    public function testResponse()
    {
        $apiHelper = new ApiResponseHelper('Testing API Response');
        return $apiHelper->foo();
    }

    /**
     * Testing Response
     *
     */
    public function testApiResponseHelper()
    {
        return app(ApiResponseHelper::class)->foo();
    }

    /**
     * Testing Response
     *
     */
    public function testStaticApiResponseHelper(Request $request)
    {
        $requestData = $request->toArray();
        //$value = $requestData['test_foo'] ?? 'Hello, foo!';
        return $apiResponse = ApiResponseHelper::getApiResponse();
        $apiResponseAgain = ApiResponseHelper::setFoo('Hello, foo again!');
        $this->testService->updateFoo('Hello, foo again from service!');
        return $apiResponse->foo() . ' - ' . $apiResponseAgain->foo();
    }
}
