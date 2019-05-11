<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    protected $guarded = [];

    public function visit()
    {
        return $this->belongsTo('App\Visit');
    }
}
