<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyDetail extends Model
{
    protected $guarded = [];
    protected $fillable = ['property_id', 'description', 'address','bedrooms','bathrooms', 'is_occupancy_status', 'is_possession_available', 'is_installment_available'];

    /**
     * A Property Detail belongs to a Property
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function property(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
