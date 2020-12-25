<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $guarded = [];
    
    public function orphanage(){
        return $this->belongsTo(Orphanage::class);
    }

    public function photo(){
        return '/storage/'.$this->media;
    }
}
