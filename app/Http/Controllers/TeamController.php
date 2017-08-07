<?php

namespace App\Http\Controllers;

use App\Match;
use App\Match_stat;
use Illuminate\Http\Request;
use App\Team;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function detail(Request $req){
        $team=Team::where('team_shortName',$req->short)->first();
        $matches=Match::where('first_team',$team->id)->orWhere('second_team',$team->id)->get();
        $match_stats=Match_stat::where('team1',$team->id)->orWhere('team2',$team->id)->where('quarter_number',4)->get();
        return view('Team.team_detail')->with('team',$team)->with('matches',$matches)->with('match_stats',$match_stats);
    }

}
