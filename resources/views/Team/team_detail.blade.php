@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/detail_page.css')}}">

@endsection

@section('content')
<div class="container-fluid">
    <div class="detail_box col-md-offset-1 col-md-10">

        <center><h4><img src="{{asset($team->team_img)}}" alt=""> {{$team->team_name}}</h4></center>

        <div class="players_div">
            <h5>Players</h5>
            <ul>
                @foreach($team->Players()->pluck('name_surname','id') as $id => $player)

                    <li class="player"><img src="{{asset('images/player_default.png')}}" alt="">
                        <a href="javascript:void(0)">{{$player}} </a>({{App\Player::find($id)->position}})<br>
                    </li>

                @endforeach
            </ul>
        </div>


        <div class="matches_div">
            <h5>Matches</h5>
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th></th>
                    <th>Result</th>

                </tr>
                </thead>
                <tbody>

                    @foreach($matches as $match)
                        <tr>
                            <td style="font-size: 20px;text-shadow: 0 0 2px white" align="center">{{App\Team::find($match->first_team)->team_shortName}} - {{App\Team::find($match->second_team)->team_shortName}}</td>
                             @php
                                 $team1_points=[];
                                 $team2_points=[];
                                    foreach ($match_stats as $ms){
                                    if($ms->match_id === $match->id){
                                            array_push($team1_points,$ms->team1_point);
                                            array_push($team2_points,$ms->team2_point);
                                        }
                                    }
                             @endphp
                            <td>@foreach($match_stats as $ms)
                                    @if($ms->match_id === $match->id && $ms->quarter_number===4)
                                       {{$ms->team1_point}} -
                                       {{$ms->team2_point}}
                                    @endif
                                @endforeach
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('scripts')


@endsection