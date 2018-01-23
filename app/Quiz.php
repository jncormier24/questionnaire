<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quiz';
    protected $guarded = ['id'];
    protected $with = ['category'];

    public function category () {
        return $this->belongsTo(\App\QuizCategory::class, 'quiz_category_id');
    }

    public function users () {
        return $this->belongsToMany(\App\User::class);
    }

    public function questions () {
        return $this->hasMany(\App\Question::class);
    }
}
