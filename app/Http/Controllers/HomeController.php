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
        $score=array();
        $team1=Team::find($req->team1);
        $team2=Team::find($req->team2);
        $overall_total=$team1->team_overall+$team2->team_overall;
        $team1_per=round($team1->team_overall/$overall_total*100);
        $team2_per=round($team2->team_overall/$overall_total*100);
        for ($i=0;$i<$team1_per;$i++){
            array_push($score,'team_1');
        }
        for ($i=0;$i<$team2_per;$i++){
            array_push($score,'team_2');
        }


    }







}
