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
    public function aUserCanViewAQuizToEdit () {
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
        $response = $this->get("/quiz");
        // assert the name is there
        $response->assertSee($quiz->name);
    }

    /** @test */
    public function aUserCanEditAQuiz()
    {
        $user = factory(\App\User::class)->create();
        $this->be($user);

        $quiz = factory(\App\Quiz::class)->create();

        $this->post('/quiz', $quiz->toArray());

        $this->patch("/quiz/{$quiz->id}", [
            'name' => 'Changed'
        ]);

        $reponse = $this->get('/quiz')->assertSee('Changed');
    }

    /** @test */
    public function aGuestMayNotCreateAQuiz () {
        // create a quiz instance with make()
        $quiz = factory(\App\Quiz::class)->create();
        // submit the quiz to post with toArray() on the quiz
        $response = $this->post('/quiz', $quiz->toArray());

        $response->assertSee("/login");
    }

    /** @test */
    public function itMayBeDeleted () {
        // create a user
        $this->actingAs(factory(\App\User::class)->create());

        // create a quiz and persist it
        $quiz = factory(\App\Quiz::class)->create(['updated_by_user_id' => auth()->id()]);

        $this->post('/quiz', $quiz->toArray());

        // delete the post
        $this->json('DELETE', "/quiz/{$quiz->id}");

        $this->assertDatabaseMissing('quiz', $quiz->toArray());
    }
}