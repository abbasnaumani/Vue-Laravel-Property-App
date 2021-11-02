<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    protected $guarded = [];
    /**
     * Property Type belongs to a Property Sub Type
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function propertySubType(){
        return $this->hasOne(PropertySubType::class);
    }
}
