<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orphanage extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function photo(){
        return '/storage/'.$this->activity_media;
    }

    public function building_image(){
        return '/storage/'.$this->building_media;
    }

    public function galleries(){
        return $this->hasMany(Gallery::class);
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
       public function donations(){
        return $this->hasMany(Donation::class);
    }
}
