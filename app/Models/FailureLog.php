<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FailureLog extends Model
{
    protected $table = 'failure_logs';
    public $fillable = ['name', 'value', 'json_data'];

    public function setUpdatedAt($value)
    {
        // Do nothing.
    }
}
