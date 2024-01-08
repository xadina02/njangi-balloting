<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ballot;

class BallotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['avatar' => 'img/balloting_blue_gray.png', 'position' => 4],
            ['avatar' => 'img/balloting_blue.png', 'position' => 8],
            ['avatar' => 'img/balloting_brown.png', 'position' => 6],
            ['avatar' => 'img/balloting_gray.png', 'position' => 11],
            ['avatar' => 'img/balloting_green.png', 'position' => 3],
            ['avatar' => 'img/balloting_orange.png', 'position' => 13],
            ['avatar' => 'img/balloting_pink.png', 'position' => 9],
            ['avatar' => 'img/balloting_purple.png', 'position' => 12],
            ['avatar' => 'img/balloting_red.png', 'position' => 1],
            ['avatar' => 'img/balloting_sky_blue.png', 'position' => 7],
            ['avatar' => 'img/balloting_teal.png', 'position' => 10],
            ['avatar' => 'img/balloting_white.png', 'position' => 2],
            ['avatar' => 'img/balloting_yellow.png', 'position' => 5],
        ];

        // Use the Eloquent model to insert the data into the 'ballots' table
        foreach ($data as $item) {
            Ballot::create($item);
        }
    }
}
