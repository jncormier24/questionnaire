<?php
namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class QuizTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    public function aUserCanSeeAQuiz () {
        $quiz = factory(\App\Quiz::class)->create();
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->get("/quiz");

        $response->assertSee($quiz->name);
    }
    
    /** @test */
    public function aUserCanEditAQuiz () {
        $quiz = factory(\App\Quiz::class)->create();
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->get("/quiz/{$quiz->id}/edit");

        $response->assertSee($quiz->name);
    }

    /** @test */
    public function aUserCanCreateAQuiz () {
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->get("/quiz/create");

        $response->assertSee('Quiz Name');
    }
}