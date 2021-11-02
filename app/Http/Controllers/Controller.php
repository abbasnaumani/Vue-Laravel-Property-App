<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use App\Traits\VerificationToken;
use App\Traits\CustomHash;
use App\Traits\AuthUser;
use App\Traits\GlobalSettingsTrait;
use App\Traits\UserTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /*## Custom Traits  ##*/
<<<<<<< HEAD
    use AuthUser, ApiResponse, GlobalSettingsTrait, VerificationToken, CustomHash;
=======
    use AuthUser, ApiResponse, GlobalSettingsTrait, UserTrait;
>>>>>>> 5f6b37cef3c16f51d188508538f11d733e5c686c
}
