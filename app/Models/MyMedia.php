<?php


namespace App\Models;



use App\Casts\Json;
use Plank\Mediable\Media;
use Plank\Mediable\Mediable;

class MyMedia extends Media
{
    use Mediable;
    protected $casts = [
        'custom_properties' => Json::class,
    ];
    // Add your Methods here
}
