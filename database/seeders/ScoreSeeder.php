<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Score;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Score::create([
            'score_a' => 0, 
            'score_b' => 0
        ]);
    }
}
