<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyDetail extends Model
{
    protected $guarded = [];

    /**
     * A Property Detail belongs to a Property
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function property(){
        return $this->belongsTo(Property::class);
    }
}
