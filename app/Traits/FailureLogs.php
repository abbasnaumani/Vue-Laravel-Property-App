<?php

namespace App\Traits;

use App\Models\FailureLog;

trait FailureLogs
{
    public function failureLog($name = '', $value = '', $jsonData = array())
    {
        $record = [];
        $record['name'] = $name;
        $record['value'] = json_encode($value);
        $record['json_data'] = isset($jsonData) ? json_encode($jsonData) : '';
        FailureLog::create($record);
    }
}
