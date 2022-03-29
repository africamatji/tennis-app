<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $table = 'score';
    public $timestamps = false;
    
    protected $fillable = [
        'score_a',
        'score_b',
    ];
}
