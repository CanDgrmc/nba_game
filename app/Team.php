<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function Users(){
        return $this->belongsToMany('App\\User');
    }

    public function Players(){
        return $this->hasMany('App\\Player');
    }

}
