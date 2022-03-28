<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class GameController extends Controller
{
    public function home () {
        return Inertia::render('Home');
    }

    public function score () {
        return Inertia::render('Home', [
            'scoreA' => 3,
            'scoreB' => 1,
        ]);
    }
}
