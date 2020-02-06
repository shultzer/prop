<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Realestateasset extends Model
{
    protected $fillable = [
        'name',
        'inventory_number',
        'oblast',
        'raion',
        'oblast',
        'address',
        'company_id'
    ];

    public function movableassets (  ) {
        return $this->hasMany('App\Models\Movableasset');
    }
    public function company (  ) {
        return $this->belongsTo('App\Models\Company');
    }

    public function pledgeholder (  ) {
        return $this->belongsTo('\App\Models\Pledgeholder');
    }

}
