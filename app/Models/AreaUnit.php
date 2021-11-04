<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaUnit extends Model
{
    protected $guarded = [];
    /**
     * Area Unit belongs to a Property
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function property(){
        return $this->hasOne(Property::class);
    }
}
