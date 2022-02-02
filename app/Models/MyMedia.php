<?php


namespace App\Models;



use App\Casts\Json;
use Illuminate\Database\Eloquent\SoftDeletes;
use Plank\Mediable\Media;
use Plank\Mediable\Mediable;

class MyMedia extends Media
{
    use Mediable, SoftDeletes;
    protected $table = 'media';
    protected $casts = [
        'custom_properties' => Json::class,
    ];
    // Add your Methods here
}
