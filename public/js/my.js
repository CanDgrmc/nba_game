/**
 * Created by Asus on 2.08.2017.
 */

$(document).ready(function(){
    prepareMatches()


    var clickControl=0;
    var time=0;
    var total_time=48;
    $('#startBtn').click(function(e){
        e.preventDefault()

        if(clickControl===0){
            clickControl++;

                setInterval(function(){
                    if(time<total_time){
                    time++
                    $('#minute').text(time)


                    }
                },500)

        }
    })

    $('#startBtn').click(function(){
        attack();
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
    $.post('/attack',{
        '_token':token,
        'team_1': 1,
        'team_2': 2
    },function(res){
        console.log(res.team + ':' + res.score)
    })
}