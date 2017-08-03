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

    public function getPlayerIds(){
        return $this->Players()->pluck('id');
    }
    public function getPlayerNames(){
        return $this->Players()->pluck('name_surname');
    }


    public function Score(Team $team){
        $score=array();
        $attack=$this->team_attack_overall;
        $defence=$team->team_defence_overall;

        $total=$attack+$defence;
        $success=$attack/$total*100;
        $fail=$defence/$total*100;

        for ($i=0;$i<$success;$i++){
            array_push($score,1);
        }
        for ($i=0;$i<$fail;$i++){
            array_push($score,0);
        }
        $result = array_random($score);


        return $result;
    }

}
