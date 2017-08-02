<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public function Player(){
        return $this->belongsTo('App\\Player');
    }
}
