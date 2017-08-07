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

        $match=$this->setMatches($teams);

        return view('home')->with('teams',$teams)->with('match',$match);
    }

    public function setMatches($teams){
        $count=Match::get()->count();
        $session= floor($count/4)+1;
        $matches=[];
        for ($i=0;$i<count($teams);$i+=2){
            $match=new Match();
            $match->first_team = $teams[$i]->id;
            $match->second_team = $teams[$i+1]->id;
            $match->session=$session;
            if($match->save()){
               array_push($matches,$match->id);
            }
        }
        return $matches;
    }


    public function attack(Request $req){
        $attack_turn=array();

        $team1=Team::find($req->team_1);
        $team2=Team::find($req->team_2);


        ## Team Attack Turn Possibility by Overall Points
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
                    'attacker_shortName' =>$team1->team_shortName,
                    'defender' => $team2->id,
                    'defender_shortName' => $team2->team_shortName,
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
                if($scored['assist_from']!==0){
                    $result['assist_from'] = [
                        'id' => $scored['assist_from']->id,
                        'name' => $scored['assist_from']->name_surname,
                    ];
                }else{
                    $result['assist_from'] = [
                        'id' =>$scored['attacker']->id,
                        'name' =>$scored['attacker']->name_surname,
                    ];
                }

                return $result;
                break;

            case 'team_2':

                $scored=$team2->Score($team1,$type);
                $result=[
                    'attacker' => $team2->id,
                    'attacker_shortName' =>$team2->team_shortName,
                    'defender' => $team1->id,
                    'defender_shortName' => $team1->team_shortName,
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

                if($scored['assist_from']!==0){
                    $result['assist_from'] = [
                        'id' => $scored['assist_from']->id,
                        'name' => $scored['assist_from']->name_surname,
                    ];
                }else{
                    $result['assist_from'] = [
                        'id' =>$scored['attacker']->id,
                        'name' =>$scored['attacker']->name_surname,
                    ];
                }

                return $result;

                break;
        }
    }

    public function player_stats(Request $req){
        $stats=new player_stat();
        $stats->match_id=$req->match_id;
        $stats->player_id=$req->player_id;
    }


    public function saveLog(Request $req){
        $attacker=Player::find($req->attacker_id);
        $defender=Player::find($req->defender_id);
        $match=Match::find($req->match_id);
        if($req->type==='1' || $req->type==='2'){
            $type=2;
        }else{
            $type=3;
        }
        switch ($req->status){
            case 'scored':
                $message= $attacker->name_surname.' has scored '.$type.' points';
                break;
            case 'failed':
                $message= $attacker->name_surname.' was blocked by '.$defender->name_surname;
                break;
        }
        $log=new Log();
        $log->match_id = $match->id;
        $log->attacker_team=$attacker->getTeamId();
        $log->defender_team=$defender->getTeamId();
        $log->attacker_id = $req->attacker_id;
        $log->assist_id = $req->assist_id;
        $log->defender_id = $req->defender_id;
        $log->status=$req->status;
        $log->type=$type;
        $log->message=$message;
        $log->time=$req->time;

       $log->save();


    }
    public function match_stats(Request $req){
        $match=Match::find($req->match_id);
        $stat =new Match_stat();
        $stat->match_id=$match->id;
        switch ($req->time){

            case 13:
                $quarter=1;

                $by_quarter_team1=Log::where('match_id',$match->id)->where('time','<=',12)->where('attacker_team',$match->first_team)->where('status','scored')->sum('type');
                $by_quarter_team2=Log::where('match_id',$match->id)->where('time','<=',12)->where('attacker_team',$match->second_team)->where('status','scored')->sum('type');

                break;
            case 25:
                $quarter=2;

                $by_quarter_team1=Log::where('match_id',$match->id)->where('time','<=',24)->where('attacker_team',$match->first_team)->where('status','scored')->sum('type');
                $by_quarter_team2=Log::where('match_id',$match->id)->where('time','<=',24)->where('attacker_team',$match->second_team)->where('status','scored')->sum('type');

                break;
            case 37:
                $quarter=3;

                $by_quarter_team1=Log::where('match_id',$match->id)->where('time','<=',36)->where('attacker_team',$match->first_team)->where('status','scored')->sum('type');
                $by_quarter_team2=Log::where('match_id',$match->id)->where('time','<=',36)->where('attacker_team',$match->second_team)->where('status','scored')->sum('type');

                break;
            case 49:
                $quarter=4;

                $by_quarter_team1=Log::where('match_id',$match->id)->where('time','<=',48)->where('attacker_team',$match->first_team)->where('status','scored')->sum('type');
                $by_quarter_team2=Log::where('match_id',$match->id)->where('time','<=',48)->where('attacker_team',$match->second_team)->where('status','scored')->sum('type');

                break;
        }
        $return=[
            'quarter' => $quarter,
            'team1_id' => $match->first_team,
            'team2_id' => $match->second_team,
            'team1_point' => $by_quarter_team1,
            'team2_point' => $by_quarter_team2
        ];


        $stat->quarter_number=$quarter;
        $stat->team1=$match->first_team;
        $stat->team2=$match->second_team;
        $stat->team1_point=$by_quarter_team1;
        $stat->team2_point=$by_quarter_team2;
        if($stat->save()){
            return $return;
        }





    }



    public function getLog(Request $req){
        $log = Log::where('match_id',$req->match_id)->get();
        return $log;
    }


}
