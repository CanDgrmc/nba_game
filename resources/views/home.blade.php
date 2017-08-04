@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

@endsection

@section('content')
    <div class="row">
        <center><h3 style="color:#fff; margin-top:-55px"><span id="minute">0</span> Minute</h3></center>
        <center><a href="#" style="color:black;font-size: 22px;font-weight: bold" id="startBtn">Start</a></center>
    </div>
<div class="container-fluid">
    {{csrf_field()}}
    <div class="row" style="margin-top:20px">
        <div class="col-md-11 col-md-offset-1">

    @for($i=0;$i<count($teams);$i++)
                @if($i % 2 === 0)
                    <div class="col-md-5 myBox">
                        <table class="table table-responsive" id="{{$match}}">
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

                            <tr class="team_1" team="{{$teams[$i]->id}}" data="{{$teams[$i]->team_shortName}}" id="{{$teams[$i]->id}}">
                                <td>
                                    <img src="{{asset($teams[$i]->team_img)}}" height="70" width="90">
                                    <strong class="team_name">{{$teams[$i]->team_shortName}}</strong>
                                </td>
                                <td class="first_period">-</td>
                                <td class="second_period">-</td>
                                <td class="third_period">-</td>
                                <td class="forth_period">-</td>

                            </tr>
                            <tr class="team_2" team="{{$teams[$i+1]->id}}" data="{{$teams[$i+1]->team_shortName}}" id="{{$teams[$i+1]->id}}">
                                <td><img src="{{asset($teams[$i+1]->team_img)}}" height="70" width="90">
                                    <strong class="team_name">{{$teams[$i+1]->team_shortName}}</strong>
                                </td>
                                <td class="first_period">-</td>
                                <td class="second_period">-</td>
                                <td class="third_period">-</td>
                                <td class="forth_period">-</td>

                            </tr>

                            </tbody>
                        </table>

                            <ul>
                                <li class="action" style="list-style: none;color:#fff;font-size: 16px">das</li>
                            </ul>

                    </div>
                    @php
                        $match+=1;
                    @endphp


                    @endif
    @endfor
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
