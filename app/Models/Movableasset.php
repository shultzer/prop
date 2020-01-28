<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movableasset extends Model
{

    public function realestateasset (  ) {
        return $this->belongsTo('App\Models\Realestateasset');
    }
    public function company (  ) {
        return $this->belongsTo('App\Models\Company');
    }

    public function pledgeholder (  ) {
        return $this->belongsTo('\App\Models\Pledgeholder');
    }
}
