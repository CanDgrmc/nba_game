<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{

    public function Team(){
        return $this->belongsTo('App\\Team');
    }
    public function getTeamId(){
        return $this->Team()->pluck('id')->first();
    }
    public function Skills(){
        return $this->hasOne('App\\Skill');
    }
    public function getDefenceAbility(){
        return $this->Skills()->pluck('defence')->first();
    }
    public function getThreePointAbility(){
        return $this->Skills()->pluck('point_3')->first();
    }
    public function getTwoPointAbility(){
        return $this->Skills()->pluck('point_2')->first();
    }
    public function getDunkAbility(){
        return $this->Skills()->pluck('dunk')->first();
    }
}
