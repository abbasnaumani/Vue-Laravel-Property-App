<?php

namespace App\Traits;

use App\Models\UserVerify;

trait VerificationToken
{
    public function updateOrCreateVerificationToken($paramsData = [])
    {
        $userId = $paramsData['user_id'] ?? 0;
        $type = $paramsData['type'] ?? '';
        $typeValue = $paramsData['type_value'] ?? '';
        $verify = UserVerify::where(['user_id' => $userId, 'type' => $type])->first();
        if ($verify) {
            $verify->code = $this->generateVerificationToken();
            $verify->save();
        } else {
            $verify = new UserVerify();
            $verify->code = $this->generateVerificationToken();
            $verify->user_id = $userId;
            $verify->type = $type;
            $verify->type_value = $typeValue;
            $verify->save();
        }
        return $verify;
    }

    public function generateVerificationToken()
    {
        return mt_rand(100000, 999999);
    }

    public function verifyVerificationToken($paramsData)
    {
        $userId = $paramsData['user_id'] ?? 0;
        $type = $paramsData['type'] ?? '';
        $code = $paramsData['code'] ?? '';
        $testing = false;
        if ($testing && $code == "654321") {
            $verify = UserVerify::where(['user_id' => $userId, 'type' => $type])->first();
            if ($verify) {
                $this->setApiSuccessMessage(trans('auth.link_token_success'));
                $verify->delete();

            } else {
                $this->setApiErrorMessage(trans('auth.link_token_expire'));
            }
        } else {
            $verify = UserVerify::where(['user_id' => $userId, 'type' => $type, 'code' => $code])->first();
            if ($verify) {
                $this->setApiSuccessMessage(trans('auth.link_token_success'));
                $verify->delete();
            } else {
                $this->setApiErrorMessage(trans('auth.link_token_expire'));
            }
        }
        return $this->getResponse();
    }

    public static function customQuickRandom($length = 16)
    {
        $pool = 'ABCDEFGHIJKL34567mnopqrstuvwxyzMNOPQRSTUVWXYZ01289abcdefghijkl';
        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }
}
