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
    public function aUserCanSeeCreateAQuizForm () {
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->get("/quiz/create");

        $response->assertSee('Quiz Name');
    }

    /** @test */
    public function aUserCanCreateAQuiz () {
        // create an authenticate user
        $this->actingAs(factory(\App\User::class)->create());
        // create a quiz instance with make()
        $quiz = factory(\App\Quiz::class)->create();
        // submit the quiz to post with toArray() on the quiz
        $this->post('/quiz', $quiz->toArray());
        // visit the single quiz page
        $response = $this->get("/quiz/{$quiz->id}/edit");
        // assert the name is there
        $response->assertSee($quiz->name);
    }
    /** @test */
    public function aGuestMayNotCreateAQuiz () {
        // $this->expectException('Illuminate\Auth\AuthenticationException');
        // create a quiz instance with make()
        $quiz = factory(\App\Quiz::class)->create();
        // submit the quiz to post with toArray() on the quiz
        $this->post('/quiz', $quiz->toArray());
    }
}