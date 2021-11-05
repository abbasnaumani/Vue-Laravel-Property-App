<?php

namespace App\Enums;

final class ApiResponseEnum
{
    const SUCCESS_RESPONSE = 'SUCCESS';
    const ERROR_RESPONSE = 'ERROR';
    const SUCCESS_CODE = 200;
    const ERROR_CODE = 400;
    const SUCCESS_MESSAGE = 'success';
    const ERROR_MESSAGE = 'Something went wrong!';
    const RESPONSE_JSON_FORMAT = 'JSON';
}
