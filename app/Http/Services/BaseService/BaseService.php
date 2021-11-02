<?php

namespace App\Http\Services\BaseService;

use App\Traits\ApiResponse;
use App\Traits\AuthUser;
use App\Traits\GlobalSettingsTrait;
use App\Traits\UserTrait;
use App\Traits\CommonMethods;
use App\Traits\CookiesTrait;
use App\Traits\DevTestLogs;
use App\Traits\FailureLogs;
use App\Traits\RecordsActivity;

class BaseService
{
    /*## Custom Traits  ##*/
    use FailureLogs;
    use ApiResponse;
    use AuthUser;
    use GlobalSettingsTrait;    
}
