<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [];
    /**
     * City belongs to a Property
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function property(){
        return $this->belongsTo(Property::class);
    }
}
