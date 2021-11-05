<?php

namespace App\Traits;

use App\Helpers\ApiResponseHelper;

trait ApiResponse
{

    public function setApiSuccessMessage($msg, $data = null, $statusCode = 200)
    {
        ApiResponseHelper::setMessage($msg);
        ApiResponseHelper::setData($data);
        ApiResponseHelper::setCode($statusCode);
    }

    public function setApiErrorMessage($msg, $data = null, $statusCode = 400)
    {
        ApiResponseHelper::setMessage($msg);
        ApiResponseHelper::setData($data);
        ApiResponseHelper::setCode($statusCode);
    }

    public function response()
    {
        return ApiResponseHelper::getResponse();
    }

    public function getApiResponse()
    {
        return ApiResponseHelper::getApiResponse();
    }
}
