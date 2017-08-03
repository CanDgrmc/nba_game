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

                    <li><img src="{{asset('images/player_default.png')}}" alt=""><a href="{{url('player_detail/'.$id)}}">{{$player}}</a></li>

                @endforeach
            </ul>
        </div>


        <div class="matches_div">
            <h5>Matches</h5>
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th></th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('scripts')


@endsection