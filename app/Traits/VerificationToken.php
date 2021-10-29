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
        if ($verify != NULL) {
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

    public function generateVerificationToken($digits = 4)
    {
        $i = 0; //counter
        $pin = ""; //our default pin is blank.
        while ($i < $digits) {
            //generate a random number between 0 and 9.
            $pin .= mt_rand(1, 9);
            $i++;
        }
        return $pin;
    }

    public function verifyVerificationToken($paramsData)
    {
        $userId = $paramsData['user_id'] ?? 0;
        $type = $paramsData['type'] ?? '';
        $code = $paramsData['code'] ?? '';
        $response = $this->response();
        $testing = false;
        if ($testing && $code == "4321") {
            $verify = UserVerify::where(['user_id' => $userId, 'type' => $type])->first();
            if ($verify == NULL) {
                $response['message'] = 'Link is expired, please request again.';
            } else {
                $verify->delete();
                $response['status'] = 'success';
            }
        } else {
            $verify = UserVerify::where(['user_id' => $userId, 'type' => $type, 'code' => $code])->first();
            if ($verify == NULL) {
                $response['message'] = 'Link is expired, please request again.';
            } else {
                $verify->delete();
                $response['status'] = 'success';
            }
        }
        return $response;
    }

    public static function customQuickRandom($length = 16)
    {
        $pool = 'ABCDEFGHIJKL34567mnopqrstuvwxyzMNOPQRSTUVWXYZ01289abcdefghijkl';
        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }
}
