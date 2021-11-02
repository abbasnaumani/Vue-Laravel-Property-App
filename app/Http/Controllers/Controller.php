<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use App\Traits\VerificationToken;
use App\Traits\CustomHash;
use App\Traits\AuthUser;
use App\Traits\GlobalSettingsTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /*## Custom Traits  ##*/
    use AuthUser, ApiResponse, GlobalSettingsTrait, VerificationToken, CustomHash;
}
