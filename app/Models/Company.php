<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $fillable = ['name'];

    public function real_estate_assets () {
        return $this->hasMany('App\Models\Realestateasset');
    }
}
