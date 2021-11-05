<?php

namespace App\Services\BaseService;

use App\Traits\ApiResponse;
use App\Traits\AuthUser;
use App\Traits\CustomHash;
use App\Traits\GlobalSettingsTrait;
use App\Traits\FailureLogs;
use App\Traits\VerificationToken;

class BaseService
{
    /*## Custom Traits  ##*/
    use FailureLogs;
    use ApiResponse;
    use AuthUser;
    use GlobalSettingsTrait;
    use VerificationToken;
    use CustomHash;
}
