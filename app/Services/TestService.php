<?php


namespace App\Services;

use App\Helpers\ApiResponseHelper;
use App\Services\BaseService\BaseService;
use Illuminate\Http\Request;

class TestService extends BaseService
{
    /**
     * Create or Update Property in Properties Table
     */
    public function updateFoo($foo)
    {
        ApiResponseHelper::setFoo($foo);
    }
}
