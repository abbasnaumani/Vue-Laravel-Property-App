<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [];
    /**
     * City Has many  Property
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function properties(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Property::class);
    }
    /**
     * City Has many  Locations
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function locations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Location::class);
    }
}
