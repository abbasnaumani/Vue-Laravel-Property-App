<?php

namespace App\Http\Controllers;

use App\Traits\AuthUser;
use App\Traits\GlobalSettingsTrait;
use App\Traits\UserTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Kodestudio\ApiResponse\Traits\ApiResponseTrait;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /*## Custom Traits  ##*/
    use AuthUser, ApiResponseTrait, GlobalSettingsTrait,UserTrait;
}
