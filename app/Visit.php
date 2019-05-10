<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $guarded = [];
    
    public function clicks()
    {
        return $this->hasMany(Click::class);
    }
}
