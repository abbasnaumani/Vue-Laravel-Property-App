<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    protected $guarded = [];
    /**
     * Property Type has Mnay Property Sub Types
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function propertySubTypes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PropertySubType::class);
    }
}
