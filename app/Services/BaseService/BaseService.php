<?php

namespace App\Services\BaseService;

use App\Traits\AuthUser;
use App\Traits\CustomHash;
use App\Traits\GlobalSettingsTrait;
use App\Traits\FailureLogs;
use App\Traits\VerificationToken;
use Kodestudio\ApiResponse\Traits\ApiResponseTrait;

class BaseService
{
    /*## Custom Traits  ##*/
    use FailureLogs;
    use ApiResponseTrait;
    use AuthUser;
    use GlobalSettingsTrait;
    use VerificationToken;
    use CustomHash;
}
