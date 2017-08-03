<?php

namespace App\Http\Controllers;

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
        $teams=Team::limit(8)->get();
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

        $team1_attack=$team1->team_attack_overall;
        $team2_attack=$team2->team_attack_overall;

        $total=$team1_attack+$team2_attack;

        $team1_per=round($team1_attack/$total*100);
        $team2_per=round($team2_attack/$total*100);
        for ($i=0;$i<$team1_per;$i++){
            array_push($attack_turn,'team_1');
        }
        for ($i=0;$i<$team2_per;$i++){
            array_push($attack_turn,'team_2');
        }

        $on_attack=array_random($attack_turn);
        switch ($on_attack){
            case 'team_1':
                $attack=$team1->team_attack_overall;
                $defence=$team2->team_defence_overall;
                $total=$attack+$defence;
                break;
            case 'team_2':
                break;
        }



    }







}
