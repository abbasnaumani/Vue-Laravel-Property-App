<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','phone_number','message'];
    /**
     * Contact Us belongs to an Agency
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agency(){
        return $this->belongsTo(Agency::class);
    }
}
