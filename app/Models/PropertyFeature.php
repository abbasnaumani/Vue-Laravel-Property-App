<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyFeature extends Model
{
    protected $fillable = ['property_id', 'is_central_air_conditioning', 'is_central_heating', 'is_furnished', 'other_facilities'];
    /**
     * Property Feature belongs to a Property
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function property(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
