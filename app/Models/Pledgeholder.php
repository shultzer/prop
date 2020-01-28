<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pledgeholder extends Model
{

    public function realestateassets (  ) {
        return $this->hasMany('App\Models\Realestateasset');
    }
}
