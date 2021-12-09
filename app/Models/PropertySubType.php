<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertySubType extends Model
{
    protected $guarded = [];
    /**
     * Property Sub Type has a Property Type
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function propertyType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(PropertyType::class);
    }
    /**
     * Property Sub Type has many Properties
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function properties(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Property::class);
    }
}
