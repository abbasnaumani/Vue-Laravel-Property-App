<?php

namespace App\Helpers;

use App\Enums\ApiResponseEnum;

class ApiResponseHelper
{
    public $status = ApiResponseEnum::ERROR_RESPONSE;
    public $message = ApiResponseEnum::ERROR_MESSAGE;
    private $code = ApiResponseEnum::ERROR_CODE;
    public $data;
    private $responseFormat = ApiResponseEnum::RESPONSE_JSON_FORMAT;

    public static function setCode($code)
    {
        $apiHelper = app(ApiResponseHelper::class);
        $apiHelper->code = $code;
        if($code == ApiResponseEnum::SUCCESS_CODE){
            $apiHelper->status = ApiResponseEnum::SUCCESS_RESPONSE;
        }
    }

    public static function getCode()
    {
        $apiHelper = app(ApiResponseHelper::class);
        return $apiHelper->code;
    }

    public static function setMessage($message)
    {
        $apiHelper = app(ApiResponseHelper::class);
        $apiHelper->message = $message;
    }

    public static function getMessage()
    {
        $apiHelper = app(ApiResponseHelper::class);
        return $apiHelper->message;
    }

    public static function setData($data)
    {
        $apiHelper = app(ApiResponseHelper::class);
        $apiHelper->data = $data;
    }

    public static function getData()
    {
        $apiHelper = app(ApiResponseHelper::class);
        return $apiHelper->data;
    }

    public static function setResponseFormat($responseFormat)
    {
        $apiHelper = app(ApiResponseHelper::class);
        $apiHelper->responseFormat = $responseFormat;
    }

    public static function getResponseFormat()
    {
        $apiHelper = app(ApiResponseHelper::class);
        return $apiHelper->responseFormat;
    }

    public static function getResponse()
    {
        return app(ApiResponseHelper::class);
    }

    public static function getApiResponse()
    {
        $apiHelper = app(ApiResponseHelper::class);
        if ($apiHelper->responseFormat == ApiResponseEnum::RESPONSE_JSON_FORMAT) {
            return response()->json($apiHelper, $apiHelper->code);
        }
        return $apiHelper;
    }
}
