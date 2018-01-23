<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AnswerTest extends TestCase
{
    use DatabaseMigrations;
    
    /** @test */
    public function aUserMayViewAQuizTheyAreAssigned () {
        $user = factory(\App\User::class)->create();

        $this->be($user);

        $quiz = factory(\App\Quiz::class)->create();

        $quiz->users()->save($user);

        $this->get("/quiz/evaluation/{$quiz->id}")->assertSee($quiz->name);
    }

}