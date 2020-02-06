<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pledgeholder extends Model
{
    protected $fillable = [
        'bank_name',
        'contract',
        'start_period',
        'end_period'
    ];

    public function realestateassets (  ) {
        return $this->hasMany('App\Models\Realestateasset');
    }
}
