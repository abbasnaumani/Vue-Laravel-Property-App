<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $guarded = [];
    protected $fillable = ['property_sub_type_id',
'area_unit_id',
'city_id',
'title',
'area',
'purpose',
'price',
'location'];

    /**
     * Property has a Property Detail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function propertyDetail(){
        return $this->hasOne(PropertyDetail::class);
    }
    /**
     * Property belongs to a Property SubType
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function propertySubType(){
        return $this->belongsTo(PropertySubType::class);
    }
    /**
     * Property belongs to a Area Unit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function areaUnit(){
        return $this->belongsTo(AreaUnit::class);
    }
    /**
     * Property belongs to a City
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city(){
        return $this->belongsTo(City::class);
    }
    /**
     * Property belongs to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
