<?php

use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $players=[
            ## BOSTON
            [
                'team_id' =>App\Team::where('team_shortName','BST')->first()->id,
                'name_surname' => 'Kadeem Allen',
                'number' => 45,
                'position' => 'G',
                'height' => 190,
                'weight' => 90
            ],
            [
                'team_id' =>App\Team::where('team_shortName','BST')->first()->id,
                'name_surname' => 'Jabari Birt',
                'number' => 26,
                'position' => 'G',
                'height' => 198,
                'weight' => 90
            ],
            [
                'team_id' =>App\Team::where('team_shortName','BST')->first()->id,
                'name_surname' => 'Jaylen Brown',
                'number' => 7,
                'position' => 'F',
                'height' => 201,
                'weight' => 102
            ],
            [
                'team_id' =>App\Team::where('team_shortName','BST')->first()->id,
                'name_surname' => 'Jae Crowder',
                'number' => 99,
                'position' => 'F',
                'height' => 198,
                'weight' => 107
            ],
            [
                'team_id' =>App\Team::where('team_shortName','BST')->first()->id,
                'name_surname' => 'Gerald Green',
                'number' => 30,
                'position' => 'F',
                'height' => 201,
                'weight' => 93
            ],


            ## BOSTON END

            ## NETS
            [
                'team_id' =>App\Team::where('team_shortName','NET')->first()->id,
                'name_surname' => 'Quincy Acy',
                'number' => 13,
                'position' => 'F',
                'height' => 201,
                'weight' => 109
             ],
            [
                'team_id' =>App\Team::where('team_shortName','NET')->first()->id,
                'name_surname' => ',Jarret Allen',
                'number' => 1,
                'position' => 'C',
                'height' => 208,
                'weight' => 106
            ],
            [
                'team_id' =>App\Team::where('team_shortName','NET')->first()->id,
                'name_surname' => 'Joe Harris',
                'number' => 12,
                'position' => 'G-F',
                'height' => 198,
                'weight' => 99
            ],
            [
                'team_id' =>App\Team::where('team_shortName','NET')->first()->id,
                'name_surname' => 'Trevor Booker',
                'number' => 35,
                'position' => 'F',
                'height' => 203,
                'weight' => 104
            ],
            [
                'team_id' =>App\Team::where('team_shortName','NET')->first()->id,
                'name_surname' => 'Rondea Hollis Jefferson',
                'number' => 24,
                'position' => 'G-F',
                'height' => 201,
                'weight' => 97
            ],

            ## NETS END

            ## MINNESOTA
            [
                'team_id' =>App\Team::where('team_shortName','MIN')->first()->id,
                'name_surname' => 'Cole Aldrich',
                'number' => 45,
                'position' => 'C',
                'height' => 211,
                'weight' => 113
            ],
            [
                'team_id' =>App\Team::where('team_shortName','MIN')->first()->id,
                'name_surname' => 'Nemanja Bjelica',
                'number' => 88,
                'position' => 'F',
                'height' => 208,
                'weight' => 102
            ],
            [
                'team_id' =>App\Team::where('team_shortName','MIN')->first()->id,
                'name_surname' => 'Jimmy Butler',
                'number' => 2,
                'position' => 'G-F',
                'height' => 201,
                'weight' => 105
            ],
            [
                'team_id' =>App\Team::where('team_shortName','MIN')->first()->id,
                'name_surname' => 'Tyus Jones',
                'number' => 1,
                'position' => 'G',
                'height' => 188,
                'weight' => 88
            ],
            [
                'team_id' =>App\Team::where('team_shortName','MIN')->first()->id,
                'name_surname' => 'Shabazz Muhammad',
                'number' => 15,
                'position' => 'F',
                'height' => 198,
                'weight' => 101
            ],

            ## MINNESOTA END

            ## SPURS
            [
                'team_id' =>App\Team::where('team_shortName','SPU')->first()->id,
                'name_surname' => 'LaMarcus Alridge',
                'number' => 12,
                'position' => 'F',
                'height' => 211,
                'weight' => 118
            ],
            [
                'team_id' =>App\Team::where('team_shortName','SPU')->first()->id,
                'name_surname' => 'Kyle Anderson',
                'number' => 1,
                'position' => 'F-G',
                'height' => 206,
                'weight' => 104
            ],
            [
                'team_id' =>App\Team::where('team_shortName','SPU')->first()->id,
                'name_surname' => 'Joel Anthony',
                'number' => 30,
                'position' => 'C',
                'height' => 206,
                'weight' => 104
            ],
            [
                'team_id' =>App\Team::where('team_shortName','SPU')->first()->id,
                'name_surname' => 'Davis Bertans',
                'number' => 42,
                'position' => 'F',
                'height' => 205,
                'weight' => 95
            ],
            [
                'team_id' =>App\Team::where('team_shortName','SPU')->first()->id,
                'name_surname' => 'Jaron Blossomgame',
                'number' => 15,
                'position' => 'F',
                'height' => 203,
                'weight' => 99
            ],

            ## SPURS END

            ## Cleveland
            [
                'team_id' =>App\Team::where('team_shortName','CLV')->first()->id,
                'name_surname' => 'Jose Calderon',
                'number' => 12,
                'position' => 'G',
                'height' => 190,
                'weight' => 91
            ],
            [
                'team_id' =>App\Team::where('team_shortName','CLV')->first()->id,
                'name_surname' => 'Channing Frye',
                'number' => 8,
                'position' => 'F',
                'height' => 211,
                'weight' => 116
            ],
            [
                'team_id' =>App\Team::where('team_shortName','CLV')->first()->id,
                'name_surname' => 'Jeff Green',
                'number' => 32,
                'position' => 'F',
                'height' => 206,
                'weight' => 106
            ],
            [
                'team_id' =>App\Team::where('team_shortName','CLV')->first()->id,
                'name_surname' => 'Tristan Thompson',
                'number' => 13,
                'position' => 'F-C',
                'height' => 206,
                'weight' => 108
            ],
            [
                'team_id' =>App\Team::where('team_shortName','CLV')->first()->id,
                'name_surname' => 'Edy Tavares',
                'number' => 40,
                'position' => 'C',
                'height' => 221,
                'weight' => 120
            ],

            ## Cleveland END

            ## DALLAS
            [
                'team_id' =>App\Team::where('team_shortName','DAL')->first()->id,
                'name_surname' => 'J.J. Barea',
                'number' => 12,
                'position' => 'G',
                'height' => 190,
                'weight' => 91
            ],
            [
                'team_id' =>App\Team::where('team_shortName','DAL')->first()->id,
                'name_surname' => 'Harrison Barnes',
                'number' => 40,
                'position' => 'F',
                'height' => 203,
                'weight' => 102
            ],
            [
                'team_id' =>App\Team::where('team_shortName','DAL')->first()->id,
                'name_surname' => 'Dorian Finney-Smith',
                'number' => 10,
                'position' => 'F',
                'height' => 203,
                'weight' => 100
            ],
            [
                'team_id' =>App\Team::where('team_shortName','DAL')->first()->id,
                'name_surname' => 'Nerlens Noel',
                'number' => 13,
                'position' => 'F-C',
                'height' => 206,
                'weight' => 108
            ],
            [
                'team_id' =>App\Team::where('team_shortName','DAL')->first()->id,
                'name_surname' => 'Edy Tavaress',
                'number' => 3,
                'position' => 'C',
                'height' => 211,
                'weight' => 103
            ],

            ## DALLAS END

            ## LAKERS
            [
                'team_id' =>App\Team::where('team_shortName','LA')->first()->id,
                'name_surname' => 'Corey Brawer',
                'number' => 3,
                'position' => 'G-F',
                'height' => 206,
                'weight' => 84
            ],
            [
                'team_id' =>App\Team::where('team_shortName','LA')->first()->id,
                'name_surname' => 'Luol Deng',
                'number' => 9,
                'position' => 'F',
                'height' => 206,
                'weight' => 100
            ],
            [
                'team_id' =>App\Team::where('team_shortName','LA')->first()->id,
                'name_surname' => 'Thomas Robinson',
                'number' => 15,
                'position' => 'F',
                'height' => 208,
                'weight' => 107
            ],
            [
                'team_id' =>App\Team::where('team_shortName','LA')->first()->id,
                'name_surname' => 'Metta World Peace',
                'number' => 17,
                'position' => 'F',
                'height' => 201,
                'weight' => 118
            ],
            [
                'team_id' =>App\Team::where('team_shortName','LA')->first()->id,
                'name_surname' => 'Ivica Zubac',
                'number' => 40,
                'position' => 'C',
                'height' => 216,
                'weight' => 108
            ],

            ## LAKERS END

            ## CHI
            [
                'team_id' =>App\Team::where('team_shortName','CHI')->first()->id,
                'name_surname' => 'Anthony Morrow',
                'number' => 11,
                'position' => 'G',
                'height' => 196,
                'weight' => 95
            ],
            [
                'team_id' =>App\Team::where('team_shortName','CHI')->first()->id,
                'name_surname' => 'Nikola Mirotic',
                'number' => 44,
                'position' => 'F',
                'height' => 208,
                'weight' => 108
            ],
            [
                'team_id' =>App\Team::where('team_shortName','CHI')->first()->id,
                'name_surname' => 'Bobby Portis',
                'number' => 5,
                'position' => 'F',
                'height' => 211,
                'weight' => 111
            ],
            [
                'team_id' =>App\Team::where('team_shortName','CHI')->first()->id,
                'name_surname' => 'Christiano Felicio',
                'number' => 6,
                'position' => 'F',
                'height' => 206,
                'weight' => 120
            ],
            [
                'team_id' =>App\Team::where('team_shortName','CHI')->first()->id,
                'name_surname' => 'Robin Lopez',
                'number' => 8,
                'position' => 'C',
                'height' => 213,
                'weight' => 115
            ],

            ## CHI END

            ## DET
            [
                'team_id' =>App\Team::where('team_shortName','DET')->first()->id,
                'name_surname' => 'Avery Bradley',
                'number' => 1,
                'position' => 'G',
                'height' => 188,
                'weight' => 81
            ],
            [
                'team_id' =>App\Team::where('team_shortName','DET')->first()->id,
                'name_surname' => 'Reggie Bulloc',
                'number' => 25,
                'position' => 'F',
                'height' => 201,
                'weight' => 93
            ],
            [
                'team_id' =>App\Team::where('team_shortName','DET')->first()->id,
                'name_surname' => 'Henry Ellenson',
                'number' => 8,
                'position' => 'F',
                'height' => 211,
                'weight' => 111
            ],
            [
                'team_id' =>App\Team::where('team_shortName','DET')->first()->id,
                'name_surname' => 'Eric Moreland',
                'number' => 24,
                'position' => 'F-C',
                'height' => 208,
                'weight' => 108
            ],
            [
                'team_id' =>App\Team::where('team_shortName','DET')->first()->id,
                'name_surname' => 'Andre Drummond',
                'number' => 0,
                'position' => 'C',
                'height' => 201,
                'weight' => 126
            ],

            ## DET END

        ];
        foreach ($players as $player){
            DB::table('players')->insert($player);
        }


    }
}
