<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertySubType extends Model
{
    protected $guarded = [];
    /**
     * Property Sub Type has a Property Type
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function propertyType(){
        return $this->hasOne(PropertyType::class);
    }
    /**
     * Property Sub Type belongs to a Property
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function property(){
        return $this->hasOne(Property::class);
    }
}
