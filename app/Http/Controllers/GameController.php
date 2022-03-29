<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Score;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GameController extends Controller
{
    public function home () {
        $score = $this->getScore();
        $buildScore = $this->buildScore($score->score_a, $score->score_b);
        
        return Inertia::render('Home', [
            'scoreA' => $score->score_a,
            'scoreB' => $score->score_b,
            'winner' => '',
        ]);
    }

    public function score (Request $request) {
        $scoreA = (int) $request->input('scoreA');
        $scoreB = (int) $request->input('scoreB');
        $this->updateScore($scoreA, $scoreB);
        $score = $this->getScore();
        $winner = $this->findWinner( $score->score_a,  $score->score_b);
        $buildScore = $this->buildScore($score->score_a, $score->score_b);
        $buildScore['winner'] = $winner;

        return Inertia::render('Home', $buildScore);
    }

    public function updateScore ($scoreA, $scoreB) {
        Score::where('id', 1)->update([
            'score_a' => \DB::raw('score_a+'.$scoreA),
            'score_b' => \DB::raw('score_b+'.$scoreB),
        ]);
    }

    public function getScore () {
        $score = Score::all();

        return $score[0];
    }

    public function findWinner ($scoreA, $scoreB) {
        $str = '';
        if ($scoreA >= 4 && ($scoreA - $scoreB >= 2)) {
            $str = 'Player A';
        } else if ($scoreB >= 4 && ($scoreB - $scoreA >= 2)) {
            $str = 'Player B';
        }
        
        return $str;
    }

    public function buildScore ($scoreA, $scoreB) {
        $str = '';

        if ($scoreA >= 3 && $scoreB >= 3) {
            if ($scoreA > $scoreB) {
                $arr = [
                    'scoreA' => $scoreA.' Advantage',
                    'scoreB' => $scoreB,
                ]; 
            } else if ($scoreB > $scoreA) {
                $arr = [
                    'scoreA' => $scoreA,
                    'scoreB' => $scoreB.' Advantage',
                ]; 
            } else if ($scoreA == $scoreB) {
                $arr = [
                    'scoreA' => $scoreA.' Deuce',
                    'scoreB' => $scoreB.' Deuce',
                ]; 
            }
            
            return $arr;
        }

        if ($scoreA == $scoreB) {
            $str = ($scoreA < 3) ? 'Thirty All' : $str;
            $str = ($scoreA < 2) ? 'Fifteen All' : $str;
            $str = ($scoreA < 1) ? 'Love All' : $str;
        }

        $arr = [
            'scoreA' => $scoreA.' '.$str,
            'scoreB' => $scoreB.' '.$str,
        ];

        return $arr;
    }

    public function resetScore () {
        Score::where('id',1)->update([
            'score_a'=> 0,
            'score_b'=> 0,
        ]);
    }
}
