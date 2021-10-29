<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalSetting extends Model
{
    use HasFactory;
    public $fillable = ['display_name','field_name','value','comments','value_type','created_at','updated_at'];
    protected $table = 'global_settings';
}
