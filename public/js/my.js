/**
 * Created by Asus on 2.08.2017.
 */
var clickControl=0;
var time=0;

$(document).ready(function(){

    prepareMatches()


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

            if(res.score==='scored'){
                var score
                if(time<=15){
                    score =$('#'+res.attacker).children('.first_period').html();
                    if(score==='-'){
                        $('#'+res.attacker).children('.first_period').html('3')
                    }
                }
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