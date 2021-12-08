<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Agency;
use App\Models\Role;
use App\Models\User;
use App\Services\AgencyService;
use App\Services\AuthService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    protected $authService;
    protected $agencyService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthService $authService, AgencyService $agencyService)
    {
        $this->middleware('guest');
        $this->authService = $authService;
        $this->agencyService = $agencyService;
    }

    /**
     * Handle an incoming registration request.
     *
     * @param \Illuminate\Http\Request $request
     *
     *
     *
     */
    public function __invoke(RegisterRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'password' => Hash::make($request->password),
            ]);
            $agencySlug = $this->agencyService->getUniqueAgencyByParams(['type' => 'slug', 'name' => Str::slug($request->agency_name)]);

            $agency = Agency::create([
                'name' => $request->agency_name,
                'email' => $request->agency_email,
                'slug' => $agencySlug,
                'phone_number' => $request->agency_phone_number,
                'address' => $request->agency_address,
            ]);

            $agencyId = $agency->id ?? 0;
            $user->agencies()->attach($agencyId, ['role_id' => Role::AGENCY_ADMIN]);

            DB::commit();
            event(new Registered($user));
            $this->setApiSuccessMessage(
                trans('auth.registration_success'),
                $this->authService->getLoginPayload($user)
            );
        } catch (\Exception $e) {
            DB::rollBack();
            $this->setApiErrorMessage(trans('auth.registration_failed').$e->getMessage());
        }
        return $this->getApiResponse();
    }
}
