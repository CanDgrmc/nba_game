/**
 * Created by Asus on 2.08.2017.
 */
$(window).bind('beforeunload',function(){

    //save info somewhere

    return 'are you sure you want to leave?';

});
var clickControl=0;
var time=0;


$(document).ready(function(){
    $('.match_details').click(function(e){
        e.preventDefault()
        var match=$(this).attr('href')
        $('.myBox').addClass('hidden');

        $('.hid'+match).removeClass('hidden')

    })
    $('.back').click(function(e){
        e.preventDefault()
        $('.myBoxes').addClass('hidden');
        $('.myBox').removeClass('hidden');
    })


    var total_time=48;
    $('#startBtn').click(function(e){
        e.preventDefault()
        $(this).fadeOut()
        $('.counter').removeClass('hidden')
        if(clickControl===0){
            clickControl++;

                var timer=setInterval(function(){
                    time++
                    if(time<=total_time){


                        $('#minute').text(time)
                        // 12 =  Min Time  24=Max Time
                        var attack_mins= Math.floor(Math.random() * (24-15+1) |0 )+15;
                        var attack_times=Math.floor(60/attack_mins)
                        attackWithTimeOut(attack_times)
                    }
                    else if(time===49){
                        clickControl=0
                        postMatchStats()
                        postPlayerStats()

                        clearInterval(timer)
                    }

                },5000)



        }
    })
})



function attackWithTimeOut(limitSecond){
    if(limitSecond!=0){
        limitSecond--
        setTimeout(function(){
            attack()
            attackWithTimeOut(limitSecond)

        },900)
    }

}

var attackControl=0;

function attack(){

    var token = $('input[name="_token"  ]').val()
    var team1=$('.team_1')
    var team2=$('.team_2')
    for(var i=0; i<team1.length;i++){
        $.post('/attack',{
            '_token' : token,
            'team_1' : team1[i].getAttribute('team'),
            'team_2' : team2[i].getAttribute('team')
        },function(res){
            var log=[];
            log['match_id']=$('#team_'+res.attacker).parents('table').attr('id')
            log['attacker_id']=res.attack_player.id;
            log['defender_id']=res.defence_player.id;
            log['type']=res.type;
            log['status']=res.score;
            log['time']=time;

            if(res.assist_from.id !== res.attack_player.id){
                log['assist_id']=res.assist_from.id;
            }

            saveLogs(log)



            if(res.score==='scored'){

                if(res.type===1){
                    score_point=2
                }else{
                    score_point=res.type
                }
                $('#team_'+res.attacker).parents('table').next('ul').find('.action').html('<span style="color:#deff31">'+res.attack_player.name+'('+ res.attacker_shortName +')</span> has scored '+score_point+' points')

                if(time<=12){
                    var point=$('#team_'+res.attacker).children('.first_period_main').html()
                    var player_point=$('#player_'+res.attack_player.id).siblings('.first_period').html()
                    var player_assist=$('#player_'+res.assist_from.id).siblings('.assist').html()
                    var total=$('#team_'+res.attacker).children('.total').html()
                    player_point=parseInt(player_point)
                    player_assist=parseInt(player_assist)
                    point=parseInt(point)
                    total=parseInt(total)
                    $('#team_'+res.attacker).children('.first_period_main').html(point + score_point)
                    $('#team_'+res.attacker).children('.total').html(total + score_point)
                    $('#player_'+res.attack_player.id).siblings('.first_period').html(player_point+score_point)
                    if(res.assist_from.id !== res.attack_player.id){
                        $('#player_'+res.assist_from.id).siblings('.assist').html(player_assist+1)
                    }



                }
                else if(time<=24 && time>12){
                    if (time===13 && attackControl===0){
                        postMatchStats()
                        attackControl++
                    }
                    var point=$('#team_'+res.attacker).children('.second_period_main').html()
                    var player_point=$('#player_'+res.attack_player.id).siblings('.second_period').html()
                    var player_assist=$('#player_'+res.assist_from.id).siblings('.assist').html()
                    var total=$('#team_'+res.attacker).children('.total').html()
                    player_point=parseInt(player_point)
                    player_assist=parseInt(player_assist)
                    point=parseInt(point)
                    total=parseInt(total)

                    $('#team_'+res.attacker).children('.second_period_main').html(point + score_point)
                    $('#player_'+res.attack_player.id).siblings('.second_period').html(player_point+score_point)
                    $('#team_'+res.attacker).children('.total').html(total + score_point)
                    if(res.assist_from.id !== res.attack_player.id){
                        $('#player_'+res.assist_from.id).siblings('.assist').html(player_assist+1)
                    }

                }
                else if(time<=36 && time>24){
                    if(time===25 && attackControl===1){
                        postMatchStats()
                        attackControl++
                    }
                    var point=$('#team_'+res.attacker).children('.third_period_main').html()
                    var player_point=$('#player_'+res.attack_player.id).siblings('.third_period').html()
                    var player_assist=$('#player_'+res.assist_from.id).siblings('.assist').html()
                    var total=$('#team_'+res.attacker).children('.total').html()
                    player_point=parseInt(player_point)
                    player_assist=parseInt(player_assist)
                    point=parseInt(point)
                    total=parseInt(total)
                    $('#team_'+res.attacker).children('.third_period_main').html(point + score_point)
                    $('#player_'+res.attack_player.id).siblings('.third_period').html(player_point+score_point)
                    $('#team_'+res.attacker).children('.total').html(total + score_point)
                    if(res.assist_from.id !== res.attack_player.id){
                        $('#player_'+res.assist_from.id).siblings('.assist').html(player_assist+1)
                    }


                }
                else if(time<=48 && time>36){
                    if(time===37 && attackControl===2){
                        postMatchStats()
                        attackControl++
                    }
                    var point=$('#team_'+res.attacker).children('.forth_period_main').html()
                    var player_point=$('#player_'+res.attack_player.id).siblings('.forth_period').html()
                    var player_assist=$('#player_'+res.assist_from.id).siblings('.assist').html()
                    var total=$('#team_'+res.attacker).children('.total').html()
                    player_point=parseInt(player_point)
                    player_assist=parseInt(player_assist)
                    point=parseInt(point)
                    total=parseInt(total)
                    $('#team_'+res.attacker).children('.forth_period_main').html(point + score_point)
                    $('#player_'+res.attack_player.id).siblings('.fourth_period').html(player_point+score_point)
                    $('#team_'+res.attacker).children('.total').html(total + score_point)
                    if(res.assist_from.id !== res.attack_player.id){
                        $('#player_'+res.assist_from.id).siblings('.assist').html(player_assist+1)
                    }

                }
                if (time===49){
                    if(time===37 && attackControl===3){
                        postMatchStats()
                        attackControl++
                    }
                }
            }
            else{
                $('#team_'+res.attacker).parents('table').next('ul').find('.action').html('<span style="color:#deff31">'+res.attack_player.name+'('+ res.attacker_shortName+')</span> was blocked by <span style="color:#deff31">'+res.defence_player.name+ '('+ res.defender_shortName +')</span>')
            }
        })


    }
}

$('.team_link').click(function(){
    if(clickControl===0){
        var short=$(this).attr('data')
        window.location.href='team_detail/'+short
    }
})
var Successtwo={};
var Successthree={};
var failTwo={};
var failThree={};


function saveLogs(log){
    var threePointTotal;
    var threePointPercentage;
    var twoPointTotal;
    var twoPointPercentage;


    var obj={
        '_token': $('input[name="_token"]').val(),
        'match_id':log['match_id'],
        'team_id':log['team_id'],
        'attacker_id':log['attacker_id'],
        'assist_id':log['assist_id'],
        'defender_id':log['defender_id'],
        'type' : log['type'],
        'status':log['status'],
        'time':log['time']
    }
    if(log['status']==='scored'){
        if(log['type']===3){
            Successthree[log['attacker_id']]=(Successthree[log['attacker_id']]||0)+1
            threePointTotal = (Successthree[log['attacker_id']]||0) + (failThree[log['attacker_id']]||0);
            threePointPercentage = (Successthree[log['attacker_id']]||0) / threePointTotal * 100;
            $('#player_'+log['attacker_id']).siblings('.threepoints').html('%'+threePointPercentage.toFixed(2))

        }else{
            Successtwo[log['attacker_id']]=(Successtwo[log['attacker_id']]||0)+1
            twoPointTotal = (Successtwo[log['attacker_id']]||0) + (failTwo[log['attacker_id']]||0);
            twoPointPercentage = (Successtwo[log['attacker_id']]||0) / twoPointTotal * 100;
            $('#player_'+log['attacker_id']).siblings('.twopoints').html('%'+twoPointPercentage.toFixed(2))
        }

    }else{
        if(log['type']===3){
            failThree[log['attacker_id']]=(failThree[log['attacker_id']]||0)+1
            threePointTotal = (Successthree[log['attacker_id']]||0) + (failThree[log['attacker_id']]||0);
            threePointPercentage = (Successthree[log['attacker_id']]||0) / threePointTotal * 100;
            $('#player_'+log['attacker_id']).siblings('.threepoints').html('%'+threePointPercentage.toFixed(2))

        }else{
            failTwo[log['attacker_id']]=(failTwo[log['attacker_id']]||0)+1
            twoPointTotal = (Successtwo[log['attacker_id']]||0) + (failTwo[log['attacker_id']]||0);
            twoPointPercentage = (Successtwo[log['attacker_id']]||0) / twoPointTotal * 100;
            $('#player_'+log['attacker_id']).siblings('.twopoints').html('%'+twoPointPercentage.toFixed(2))
        }




    }
    $.post('/saveLog',obj,function(res){

    });



}
function postMatchStats(){
    var table=$('.main')
    for(var i = 0 ; i < table.length ; i++) {
        var match = table[i].id;
        $.post('/match_stat',{
            '_token' : $('input[name="_token"]').val(),
            'time' : time,
            'match_id' : match
        },function(res){
            $('#score_'+res.team1_id).html(' - '+res.quarter+'. Quarter Result : '+res.team1_point)
            $('#score_'+res.team2_id).html(' - '+res.quarter+'. Quarter Result : '+res.team2_point)
        })
    }


}


function postPlayerStats(){
    var table=$('.secondary')
    var players=$('.players')
    players.each(function(index){
        var player_id=$(this).children('td').first().attr('id').split('_');
        player_id=player_id[1];

        var first_period=$('#player_'+player_id).siblings('.first_period').html()
        var second_period=$('#player_'+player_id).siblings('.second_period').html()
        var third_period=$('#player_'+player_id).siblings('.third_period').html()
        var forth_period=$('#player_'+player_id).siblings('.forth_period').html()
        var total_points=parseInt(first_period) + parseInt(second_period)+ parseInt(third_period)+parseInt(forth_period)
        var three_point_success=$('#player_'+player_id).siblings('.threepoints').html()
        three_point_success=three_point_success.replace('%','')
        three_point_success=parseInt(three_point_success)
        var two_point_success=$('#player_'+player_id).siblings('.twopoints').html()
        two_point_success=two_point_success.replace('%','')
        two_point_success=parseInt(two_point_success)
        var match_id=$(this).parents('table').attr('data')
        $.post('/player_stat',{
            '_token' : $('input[name="_token"]').val(),
            'match_id' : match_id,
            'player_id' : player_id,
            'points' : total_points,
            'two_points_success' : two_point_success,
            'three_points_success' : three_point_success
        })

    })
}

$('.players').on('click',function(){

    var player_id=$(this).children('td').first().attr('id').split('_');
    player_id=player_id[1];
    var match_id=$(this).parents('table').attr('data')
    $.post('/getPlayerStat',{
        '_token' : $('input[name="_token"]').val(),
        'player_id' : player_id,
        'match_id' : match_id
    },function(res){
        $('#player_attack_logs').html('')
        $('#player_defence_logs').html('')
        $('#myModal').modal('show')
        var attack=res['attack_logs']
        var defence=res['defence_logs']
        for (var i=0 ; i<attack.length; i++){
            $('#player_attack_logs').append('<tr><td></td> <td>'+ attack[i].message+'</td><td>'+attack[i].time+'. min</td></tr>')
        }
        for (var i=0 ; i<defence.length; i++){
            $('#player_defence_logs').append('<tr><td></td> <td>'+ defence[i].message+'</td><td>'+defence[i].time+'. min</td></tr>')
        }



    })

})