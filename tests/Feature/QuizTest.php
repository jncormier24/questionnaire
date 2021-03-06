<?php
namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\QuizCategory;
use App\Quiz;

class QuizTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    public function aUserCanSeeAQuiz () {
        $quiz = factory(\App\Quiz::class)->create();
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->get("/admin/quiz");

        $response->assertSee($quiz->name);
    }
    
    /** @test */
    public function aUserCanViewAQuizToEdit () {
        $quiz = factory(\App\Quiz::class)->create();
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->get("/admin/quiz/{$quiz->id}/edit");

        $response->assertSee($quiz->name);
    }

    /** @test */
    public function aUserCanSeeCreateAQuizForm () {
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->get("/admin/quiz/create");

        $response->assertSee('Quiz Name');
    }

    /** @test */
    public function aUserCanCreateAQuiz () {
        // create an authenticate user
        $this->actingAs(factory(\App\User::class)->create());
        // create a quiz instance with make()
        $quiz = factory(\App\Quiz::class)->create();
        // submit the quiz to post with toArray() on the quiz
        $this->post('/admin/quiz', $quiz->toArray());
        // visit the single quiz page
        $response = $this->get("/admin/quiz");
        // assert the name is there
        $response->assertSee($quiz->name);
    }

    /** @test */
    public function aUserCanEditAQuiz()
    {
        $this->be($user = factory(\App\User::class)->create());

        $quiz = factory(\App\Quiz::class)->create();

        $this->post('/admin/quiz', $quiz->toArray());

        $this->patch("/admin/quiz/{$quiz->id}", [
            'name' => 'Changed'
        ]);

        $this->get('/admin/quiz')->assertSee('Changed');
    }

    /** @test */
    public function aGuestMayNotCreateAQuiz () {
        // create a quiz instance with make()
        $quiz = factory(\App\Quiz::class)->create();
        // submit the quiz to post with toArray() on the quiz
        $response = $this->post('/admin/quiz', $quiz->toArray());

        $response->assertSee("/login");
    }

    /** @test */
    public function itMayBeDeleted () {
        // create a user
        $this->actingAs(factory(\App\User::class)->create());

        // create a quiz and persist it
        $quiz = factory(\App\Quiz::class)->create(['updated_by_user_id' => auth()->id()]);

        $this->post('/admin/quiz', $quiz->toArray());

        // delete the post
        $this->json('DELETE', "/admin/quiz/{$quiz->id}");

        $this->assertDatabaseMissing('quiz', $quiz->toArray());
    }

    /** @test */
    public function itCanHaveACategory () {
        $user = factory(\App\User::class)->create();
        $this->be($user);

        $category = factory(QuizCategory::class)->create();
        $quiz = factory(Quiz::class)->create(['quiz_category_id' => $category->id, 'updated_by_user_id' => $user->id]);

        $this->assertDatabaseHas('quiz', $quiz->toArray());
    }

    /** @test */
    public function itMayBeAssignedToAUser () {
        $user = factory(\App\User::class)->create();
        $this->be($user);

        $quiz = factory(\App\Quiz::class)->create();

        $this->post('/admin/quiz/'. $quiz->id . '/user', [
            'user_id' => $user->id
        ]);

        $this->assertCount(1, $quiz->users);
    }
}