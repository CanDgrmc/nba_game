<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{

    public function Team(){
        return $this->belongsTo('App\\Team');
    }
    public function Skills(){
        return $this->hasOne('App\\Skill');
    }
}
