<?php

namespace App\Traits;

trait CustomHash
{

    public function hashKey()
    {
        return [
            'str' => '6rG&;q',
            'separator' => '|',
        ];
    }

    public function customEncode($dataToEncode)
    {
        $encodeArray = [];
        $encodedKey = $this->encodeData($dataToEncode);
        if (trim($encodedKey) != '') {
            $hashKeyData = $this->hashKey();
            $beforeStr = $hashKeyData['str'] ?? '';
            if (trim($beforeStr) != '') {
                $encodeArray[] = $beforeStr;
            }
            $encodeArray[] = $encodedKey;

            $separator = $hashKeyData['separator'] ?? '|';
            $encodedKey = implode($separator, $encodeArray);
            $encodedKey= $this->encodeData($encodedKey);
        }
        return $encodedKey;
    }
    public function customDecode($dataToEncode)
    {
        $decodedKey = $this->decodeData($dataToEncode);
        if (trim($decodedKey) != '') {
            $hashKeyData = $this->hashKey();
            $separator = $hashKeyData['separator'] ?? '|';
            $decodedArray = explode($separator, $decodedKey);
            $decodedKey=$decodedArray[1]??($decodedArray[0]??$decodedArray);
            $decodedKey= $this->decodeData($decodedKey);
        }
        return $decodedKey??null;
    }
    public function encodeData($data)
    {
        return base64_encode(urlencode($data));
    }

    public function decodeData($data)
    {
        return urldecode(base64_decode($data));
    }

}
