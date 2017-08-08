@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

@endsection

@section('content')
    <div class="row">
        <center><h3 style="color:#fff; margin-top:-35px" class="hidden counter"><span id="minute">0</span> Minute</h3></center>
        <center><a href="#"  id="startBtn">Start</a></center>
    </div>
<div class="container-fluid">
    {{csrf_field()}}
    <div class="row" style="margin-top:20px">
        <div class="col-md-11 col-md-offset-1" id="matches">

    @php
    $matchCount=0;
    @endphp
    @for($i=0;$i<count($teams);$i++)
                @if($i % 2 === 0)

                    <div class="col-md-5 myBox">
                        <table class="table table-responsive main" id="{{$match[$matchCount]}}">

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

                            <tr class="team_1 team_link" team="{{$teams[$i]->id}}" data="{{$teams[$i]->team_shortName}}" id="team_{{$teams[$i]->id}}">
                                <td>
                                    <img src="{{asset($teams[$i]->team_img)}}" height="70" width="90">
                                    <strong class="team_name">{{$teams[$i]->team_shortName}}</strong>
                                </td>
                                <td class="first_period_main">0</td>
                                <td class="second_period_main">0</td>
                                <td class="third_period_main">0</td>
                                <td class="forth_period_main">0</td>
                                <td class="total" style="font-size: 28px">0</td>

                            </tr>
                            <tr class="team_2 team_link" team="{{$teams[$i+1]->id}}" data="{{$teams[$i+1]->team_shortName}}" id="team_{{$teams[$i+1]->id}}">
                                <td><img src="{{asset($teams[$i+1]->team_img)}}" height="70" width="90">
                                    <strong class="team_name">{{$teams[$i+1]->team_shortName}}</strong>
                                </td>
                                <td class="first_period_main">0</td>
                                <td class="second_period_main">0</td>
                                <td class="third_period_main">0</td>
                                <td class="forth_period_main">0</td>
                                <td class="total" style="font-size: 28px">0</td>

                            </tr>

                            </tbody>
                        </table>

                            <ul>
                                <li class="action" style="list-style: none;color:#fff;font-size: 11px">das</li>
                            </ul>

                        <center><a href="{{$match[$matchCount]}}" class="match_details">Detailed Stats</a></center>

                    </div>

                    <div class="col-md-11 myBoxes hidden hid{{$match[$matchCount]}}">
                        <h4><img src="{{asset($teams[$i]->team_img)}}" height="70" width="90">{{$teams[$i]->team_shortName}} <span id="score_{{$teams[$i]->id}}"></span> </h4>
                        <table class="table table-responsive secondary" data="{{$match[$matchCount]}}">
                            <thead>
                            <tr>
                                <th></th>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th>3 points</th>
                                <th>2 points</th>
                                <th>Assist</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($teams[$i]->getPlayerIds() as $player)
                                <tr class="players">
                                    <td id="player_{{$player}}">{{App\Player::find($player)->name_surname}}</td>
                                    <td class="first_period">0</td>
                                    <td class="second_period">0</td>
                                    <td class="third_period">0</td>
                                    <td class="forth_period">0</td>
                                    <td class="threepoints">0</td>
                                    <td class="twopoints">0</td>
                                    <td class="assist">0</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <h4><img src="{{asset($teams[$i+1]->team_img)}}" height="70" width="90">{{$teams[$i+1]->team_shortName}} <span id="score_{{$teams[$i+1]->id}}"></span></h4>
                        <table class="table table-responsive secondary" data="{{$match[$matchCount]}}">
                            <thead>
                            <tr>
                                <th></th>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th>3 points</th>
                                <th>2 points</th>
                                <th>Assist</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($teams[$i+1]->getPlayerIds() as $player)
                                <tr class="players">
                                    <td id="player_{{$player}}">{{App\Player::find($player)->name_surname}}</td>
                                    <td class="first_period">0</td>
                                    <td class="second_period">0</td>
                                    <td class="third_period">0</td>
                                    <td class="forth_period">0</td>
                                    <td class="threepoints">0</td>
                                    <td class="twopoints">0</td>
                                    <td class="assist">0</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>




                        <center>
                                <a href="" class="back">Back</a>

                        </center>

                    </div>
                    @php
                        $matchCount+=1;
                    @endphp


                    @endif

    @endfor
        </div>
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <divstyle="background-color: #c0c0c033!important;color:white">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body container-fluid">
                        <table class="table table-responsive col-md-5">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Attack</th>
                                <th>Time</th>


                            </tr>
                            </thead>
                            <tbody id="player_attack_logs">

                            </tbody>
                        </table>
                        <table class="table table-responsive col-md-5">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Defence</th>
                                <th>Time</th>


                            </tr>
                            </thead>
                            <tbody id="player_defence_logs">

                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>


    </div>

<!--
    <div class="row" style="margin-top:20px">
        <div class="col-md-11 col-md-offset-1">
            <div class="col-md-5  myBox">


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
                            <td><img src="{{asset('teams/dallas.png')}}" height="70" width="90" alt="" class="img-rounded"><strong>DAL</strong></td>
                            <td>30</td>
                            <td>30</td>
                            <td>30</td>
                            <td>30</td>

                        </tr>
                        <tr>
                            <td><img src="{{asset('teams/minnesota.png')}}" height="70" width="90" alt="" class="img-rounded"><strong>MNT</strong></td>
                            <td>30</td>
                            <td>30</td>
                            <td>30</td>
                            <td>30</td>

                        </tr>

                        </tbody>
                    </table>
            </div>
            <div class="col-md-5  myBox">
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
                        <td><img src="{{asset('teams/utah.png')}}" height="70" width="90" alt="" class="img-rounded"><strong>UTH</strong></td>
                        <td>30</td>
                        <td>30</td>
                        <td>30</td>
                        <td>30</td>

                    </tr>
                    <tr>
                        <td><img src="{{asset('teams/lakers.png')}}" height="70" width="90" alt="" class="img-rounded"><strong>LA</strong></td>
                        <td>30</td>
                        <td>30</td>
                        <td>30</td>
                        <td>30</td>

                    </tr>

                    </tbody>
                </table>

            </div>

        </div>
    </div>

    <div class="row" style="margin-top: 40px">
        <div class="col-md-11 col-md-offset-1">
            <div class="col-md-5  myBox">
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
                        <td><img src="{{asset('teams/boston.png')}}" height="70" width="90" alt="" class="img-rounded"><strong>BOS</strong></td>

                        <td>30</td>
                        <td>30</td>
                        <td>30</td>
                        <td>30</td>

                    </tr>
                    <tr>
                        <td><img src="{{asset('teams/detroit.png')}}" height="70" width="90" alt="" class="img-rounded"><strong>DET</strong></td>

                        <td>30</td>
                        <td>30</td>
                        <td>30</td>
                        <td>30</td>

                    </tr>

                    </tbody>
                </table>

            </div>
            <div class="col-md-5  myBox">
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
                        <td><img src="{{asset('teams/spurs.png')}}" height="70" width="90" alt="" class="img-rounded"><strong>SNT</strong></td>
                        <td>30</td>
                        <td>30</td>
                        <td>30</td>
                        <td>30</td>

                    </tr>
                    <tr>
                        <td><img src="{{asset('teams/cleveland.png')}}" height="70" width="90" alt="" class="img-rounded"><strong>CLV</strong></td>
                        <td>30</td>
                        <td>30</td>
                        <td>30</td>
                        <td>30</td>

                    </tr>

                    </tbody>
                </table>

            </div>

        </div>
    </div>
-->


</div>
@endsection

@section('scripts')
    <script src="js/my.js"></script>

@endsection
