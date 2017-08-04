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



    public function Score(Team $team,$type){
        $score=array();

        $team1_player=Player::find(array_random($this->getPlayerIds()->toArray()));
        $team2_player=Player::find(array_random($team->getPlayerIds()->toArray()));
        switch ($type){
            case 1:
                $attack=$team1_player->getDunkAbility();
                break;
            case 2:
                $attack=$team1_player->getTwoPointAbility();
                break;
            case 3:
                $attack=$team1_player->getThreePointAbility();
                break;

        }


        $defence=$team2_player->getDefenceAbility();

        $total=$attack+$defence;
        $success=round($attack/$total*100);
        $fail=round($defence/$total*100);

        for ($i=0;$i<$success;$i++){
            array_push($score,1);
        }
        for ($i=0;$i<$fail;$i++){
            array_push($score,0);
        }
        $result['result'] = array_random($score);
        $result['attacker']=$team1_player;
        $result['defender']=$team2_player;


        return $result;
    }

}
