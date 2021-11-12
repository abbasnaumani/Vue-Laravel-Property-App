<?php

namespace App\Http\Controllers\Auth;

use App\Enums\RoleUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use DB;

class RegisterController extends Controller
{
    protected $authService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthService $authService)
    {
        $this->middleware('guest');
        $this->authService = $authService;
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
            $user->roles()->sync(RoleUser::AGENT);
            DB::commit();
            event(new Registered($user));
            $this->setApiSuccessMessage(
                trans('auth.registration_success'),
                $this->authService->getLoginPayload($user)
            );
        } catch (\Exception $e) {
            DB::rollBack();
            $this->setApiErrorMessage(trans('auth.registration_failed'));
        }
        return $this->getApiResponse();
    }
}
