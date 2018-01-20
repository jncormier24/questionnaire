<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'question';
    protected $guarded = ['id'];
    protected $with = ['quiz'];
    const ANSWERTYPES = [
        0 => 'radio',
        1 => 'text',
        2 => 'select'
    ];

    public function quiz () {
        return $this->belongsTo(\App\Quiz::class, 'quiz_id');
    }
}
