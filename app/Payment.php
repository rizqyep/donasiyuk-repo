<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [];

    public function orphanage(){
        return $this->hasMany(Orphanage::class);
    }
}
