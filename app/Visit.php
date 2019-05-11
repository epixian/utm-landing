<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $guarded = [];
    
    public function clicks()
    {
        return $this->hasMany(Click::class)->select(array('visit_id','target','created_at'));
    }

    public function fullClicks()
    {
        return $this->hasMany(Click::class);
    }
}
