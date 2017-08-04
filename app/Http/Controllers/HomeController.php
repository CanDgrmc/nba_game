<?php

namespace App\Http\Controllers;

use App\Log;
use App\Match_stat;
use App\Player;
use App\player_stat;
use Illuminate\Http\Request;
use App\Team;
use App\Match;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams=Team::inRandomOrder()->limit(8)->get();
        $match=Match::count()+1;

        return view('home')->with('teams',$teams)->with('match',$match);
    }

    public function setMatches(Request $req){
        $count=Match::get()->count();
        $session= floor($count/4)+1;


        $match=new Match();
        $match->first_team = $req->first_team;
        $match->second_team = $req->second_team;
        $match->session=$session;
        if($match->save()){
            return 1;
        }
    }

    public function attack(Request $req){
        $attack_turn=array();

        $team1=Team::find($req->team_1);
        $team2=Team::find($req->team_2);



        ## Random Players
        $team1_players=$team1->getPlayerIds();
        $team2_players=$team2->getPlayerIds();
        $team1_player=Player::find(array_random($team1_players->toArray()));
        $team2_player=Player::find(array_random($team2_players->toArray()));
        ##


        ## Team Score Possibility by Overall Points
        $team1_attack=$team1->team_attack_overall;
        $team2_attack=$team2->team_attack_overall;

        $total=$team1_attack+$team2_attack;

        $team1_per=round($team1_attack/$total*100);
        $team2_per=round($team2_attack/$total*100);
        ##

        ## Attack Turn

        for ($i=0;$i<$team1_per;$i++){
            array_push($attack_turn,'team_1');
        }
        for ($i=0;$i<$team2_per;$i++){
            array_push($attack_turn,'team_2');
        }

        $turn=array_random($attack_turn);
        ##

        ## Types   1 = Dunk   2= 2points   3=3points
        $type=array_random([1,2,3]);


        ##

        switch ($turn){

            ## Set Return Data
            case 'team_1':
                $scored=$team1->Score($team2,$type);

                $result=[
                    'attacker' => $team1->id,
                    'defender' => $team2->id,
                    'attack_player' => [
                        'id' =>$scored['attacker']->id,
                        'name' =>$scored['attacker']->name_surname,
                    ],
                    'defence_player' => [
                        'id' =>$scored['defender']->id,
                        'name' =>$scored['defender']->name_surname,
                    ],
                    'type' => $type

                ];
                if($scored){
                    $result['score'] = 'scored';

                }else{
                    $result['score'] = 'failed';
                }

                return $result;
                break;

            case 'team_2':

                $scored=$team2->Score($team1,$type);
                $result=[
                    'attacker' => $team2->id,
                    'defender' => $team1->id,
                    'attack_player' => [
                        'id' =>$scored['attacker']->id,
                        'name' =>$scored['attacker']->name_surname,
                    ],
                    'defence_player' => [
                        'id' =>$scored['defender']->id,
                        'name' =>$scored['defender']->name_surname,
                    ],
                    'type' => $type
                ];
                if($scored['result']){
                    $result['score'] = 'scored';

                }else{
                    $result['score'] = 'failed';
                }

                return $result;

                break;
        }
    }

    public function match_result(Request $req){

        $match=new Match_stat();
        $match->id=$req->match_id;
        $match->quarter=$req->quarter;
        $match->team1_point=$req->team1_point;
        $match->team2_point=$req->team2_point;
        $match->team1_attack=$req->team1_attack;
        $match->team2_attack=$req->team2_attack;
        $match->save();

    }

    public function player_stats(Request $req){
        $stats=new player_stat();
        $stats->match_id=$req->match_id;
        $stats->player_id=$req->player_id;
    }


    public function saveLog(Request $req){
        switch ($req->status){
            case 'scored':
                $message='success';
                break;
            case 'failed':
                $message='fail';
                break;
        }
        $log=new Log();
        $log->match_id = $req->match_id;
        $log->attacker_id = $req->attacker_id;
        $log->defender_id = $req->defender_id;
        $log->status=$req->status;
        $log->type=$req->type;
        $log->message=$message;
        $log->time=$req->time;

        if($log->save()){
            return 1;
        }

    }

    public function getLog(Request $req){
        $log = Log::find($req->log_id);
        return $log;
    }

}
