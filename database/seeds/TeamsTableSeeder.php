<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams=[[
                'team_img' => 'teams/cleveland.png',
                'team_name' => 'Cleveland Cavalliers',
                'team_shortName' => 'CLV',
                'team_couch' => 'Tyronn Lue',
                'team_attack_overall' => 78,
                'team_defence_overall' => 72,
            ],
            [
                'team_img' => 'teams/boston.png',
                'team_name' => 'Boston Celtics',
                'team_shortName' => 'BST',
                'team_couch' => 'Brad Stevens',
                'team_attack_overall' => 80,
                'team_defence_overall' => 78,
            ],
            [
                'team_img' => 'teams/dallas.png',
                'team_name' => 'Dallas Mavericks',
                'team_shortName' => 'DAL',
                'team_couch' => 'Rick Carlisle',
                'team_attack_overall' => 79,
                'team_defence_overall' => 78,
            ],
            [
                'team_img' => 'teams/detroit.png',
                'team_name' => 'Detroit Pistons',
                'team_shortName' => 'DET',
                'team_couch' => 'Stan Van Gundy',
                'team_attack_overall' => 75,
                'team_defence_overall' => 79,
            ],
            [
                'team_img' => 'teams/bulls.png',
                'team_name' => 'Chicago Bulls',
                'team_shortName' => 'CHI',
                'team_couch' => 'Fred Hoiberg',
                'team_attack_overall' => 80,
                'team_defence_overall' => 78,
            ],
            [
                'team_img' => 'teams/lakers.png',
                'team_name' => 'Los Angeles Lakers',
                'team_shortName' => 'LA',
                'team_couch' => 'Luke Walton',
                'team_attack_overall' => 88,
                'team_defence_overall' => 75,
            ],
            [
                'team_img' => 'teams/minnesota.png',
                'team_name' => 'Minnesota Timberwolves',
                'team_shortName' => 'MIN',
                'team_couch' => 'Tom Thibodeau',
                'team_attack_overall' => 82,
                'team_defence_overall' => 78,
            ],
            [
                'team_img' => 'teams/nets.png',
                'team_name' => 'Brooklyn Nets',
                'team_shortName' => 'NET',
                'team_couch' => 'Kenny Atkinson',
                'team_attack_overall' => 76,
                'team_defence_overall' => 72,
            ],
            [
                'team_img' => 'teams/spurs.png',
                'team_name' => 'San Antonio Spurs',
                'team_shortName' => 'SPU',
                'team_couch' => 'Gregg Popovich',
                'team_attack_overall' => 76,
                'team_defence_overall' => 72,
            ],
        ];
        foreach ($teams as $team){
            DB::table('teams')->insert($team);
        }


    }
}
