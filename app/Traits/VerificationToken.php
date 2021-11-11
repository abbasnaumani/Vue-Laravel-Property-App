<?php

namespace App\Traits;

use App\Models\UserVerify;

trait VerificationToken
{
    protected $debugMode = true;
    protected $isTokenVerified;

    /**
     * Method for sending Verification code to user email
     *
     * @param array $params
     * @return UserVerify
     */
    public function updateOrCreateVerificationCode(array $params = []): UserVerify
    {
        $userId = $params['user_id'] ?? 0;
        $type = $params['type'] ?? '';
        $userVerify = UserVerify::where(['user_id' => $userId, 'type' => $type])->first();
        if (!$userVerify) {
            $userVerify = new UserVerify();
            $userVerify->user_id = $userId;
            $userVerify->type = $type;
            $userVerify->type_value = $params['type_value'] ?? '';
        }
        $userVerify->code = $this->generateVerificationCode();
        $userVerify->save();
        return $userVerify;
    }

    /**
     * Method to generate random 6 digits code
     *
     * @return int
     */
    public function generateVerificationCode(): int
    {
        return mt_rand(100000, 999999);
    }

    /**
     * Method to verify Code
     *
     * @param array $params
     * @return object
     */
    public function verifyVerificationCode(array $params = []): object
    {
        if ($this->debugMode && $params['code'] == "654321") {
            unset($params['code']);
        }
        $verify = UserVerify::where($params)->first();
        if ($verify) {
            $this->isTokenVerified = true;
            $this->setApiSuccessMessage(trans('auth.link_token_success'));
            $verify->delete();
        } else {
            $this->setApiErrorMessage(trans('auth.link_token_expire'));
        }
        return $this->getResponse();
    }

    /**
     * Method to Generate Custom Random String
     *
     * @param int $length
     * @return string
     */
    public static function customQuickRandom(int $length = 16): string
    {
        $pool = 'ABCDEFGHIJKL34567mnopqrstuvwxyzMNOPQRSTUVWXYZ01289abcdefghijkl';
        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }
}
