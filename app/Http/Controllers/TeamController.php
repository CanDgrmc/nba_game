<?php

namespace App\Http\Controllers;

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
        return view('Team.team_detail')->with('team',$team);
    }

}
