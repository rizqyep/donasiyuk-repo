<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orphanage(){
        return $this->belongsTo(Orphanage::class);
    }

    public function photo(){
        return '/storage/'.$this->proof;
    }
}
