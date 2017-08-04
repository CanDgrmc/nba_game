/**
 * Created by Asus on 2.08.2017.
 */


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

    //prepareMatches()
    var total_time=48;
    $('#startBtn').click(function(e){
        e.preventDefault()



        if(clickControl===0){
            clickControl++;

                var timer=setInterval(function(){
                    if(time<total_time){
                    time++
                    $('#minute').text(time)
                        attack();


                    }
                    else if(time===48){
                        clickControl=0
                        clearInterval(timer)
                    }
                },5000)

        }
    })




})


function prepareMatches(){

    var token = $('input[name="_token"  ]').val()
    var statu=0;

    var myTable=$('table')
    for(var i=0;i<myTable.length;i++){
        var match_id=myTable[i].id;
        var team_1=$('#'+match_id).find('.team_1').attr('team')
        var team_2=$('#'+match_id).find('.team_2').attr('team')

        console.log(team_1 + ' against '+team_2)

        $.post('/setMatches',{
            'first_team' : team_1,
            'second_team' : team_2,
            '_token' : token

        },function (res) {
            if(res==='1'){
                statu++;
                if(statu===4){
                    alert('All matches are set')
                }
            }
        })

    }

}

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
            log['match_id']=$('#'+res.attacker).parents('table').attr('id')
            log['attacker_id']=res.attack_player.id;
            log['defender_id']=res.defence_player.id;
            log['type']=res.type;
            log['status']=res.score;
            log['time']=time;

            saveLogs(log)

            if(res.score==='scored'){

                var point;

                var score;



                if(res.type===1){
                    score_point=2
                }else{
                    score_point=res.type
                }
                $('#'+res.attacker).parents('table').next('ul').find('.action').html('<span style="color:#deff31">'+res.attack_player.name+'('+ res.attacker_shortName +')</span> has scored '+score_point+' points')



                if(time<=12){
                    var point=$('#'+res.attacker).children('.first_period').html()
                    var player_point=$('#player_'+res.attack_player.id).siblings('.first_period').html()
                    player_point=parseInt(player_point)
                    point=parseInt(point)
                    $('#'+res.attacker).children('.first_period').html(point + score_point)
                    $('#player_'+res.attack_player.id).siblings('.first_period').html(player_point+score_point)

                }
                else if(time<=24 && time>12){
                    var point=$('#'+res.attacker).children('.second_period').html()
                    var player_point=$('#player_'+res.attack_player.id).siblings('.second_period').html()
                    player_point=parseInt(player_point)
                    point=parseInt(point)
                    $('#'+res.attacker).children('.second_period').html(point + score_point)
                    $('#player_'+res.attack_player.id).siblings('.second_period').html(player_point+score_point)

                }
                else if(time<=36 && time>24){
                    var point=$('#'+res.attacker).children('.third_period').html()
                    var player_point=$('#player_'+res.attack_player.id).siblings('.third_period').html()
                    player_point=parseInt(player_point)
                    point=parseInt(point)

                        $('#'+res.attacker).children('.third_period').html(point + score_point)
                        $('#player_'+res.attack_player.id).siblings('.third_period').html(player_point+score_point)

                }
                else if(time<=48 && time>36){
                    var point=$('#'+res.attacker).children('.forth_period').html()
                    var player_point=$('#player_'+res.attack_player.id).siblings('.forth_period').html()
                    player_point=parseInt(player_point)
                    point=parseInt(point)
                    $('#'+res.attacker).children('.forth_period').html(point + score_point)
                    $('#player_'+res.attack_player.id).siblings('.fourth_period').html(player_point+score_point)

                }
            }
            else{
                $('#'+res.attacker).parents('table').next('ul').find('.action').html('<span style="color:#deff31">'+res.attack_player.name+'('+ res.attacker_shortName+')</span> was blocked by <span style="color:#deff31">'+res.defence_player.name+ '('+ res.defender_shortName +')</span>')
            }
        })


    }


}

$('tr').click(function(){
    if(clickControl===0){
        var short=$(this).attr('data')
        window.location.href='team_detail/'+short
    }
})

function saveLogs(log){
    var obj={
        '_token': $('input[name="_token"]').val(),
        'match_id':log['match_id'],
        'attacker_id':log['attacker_id'],
        'defender_id':log['defender_id'],
        'type' : log['type'],
        'status':log['status'],
        'time':log['time']
    }
    $.post('/saveLog',obj,function(res){
        console.log(res)
    });
}