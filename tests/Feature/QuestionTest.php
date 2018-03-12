<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class QuestionTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    public function itCanBeCreatedByALoggedInUser () {
        $this->actingAs(factory(\App\User::class)->create());

        $question = factory(\App\Question::class)->create(['updated_by_user_id' => auth()->id()]);

        $this->post('/admin/question', $question->toArray());

        $this->get('/admin/question')->assertSee($question->text);
    }

    /** @test */
    public function itCanBeViewedByAUser () {
        $this->actingAs(factory(\App\User::class)->create());

        $question = factory(\App\Question::class)->create(['updated_by_user_id' => auth()->id()]);

        $this->post('/admin/question', $question->toArray());

        $this->get("/admin/question/{$question->id}/edit")->assertSee($question->text);
    }

    /** @test */
    public function itCanBeUpdatedByALoggedInUser () {
        $this->actingAs(factory(\App\User::class)->create());

        $question = factory(\App\Question::class)->create(['updated_by_user_id' => auth()->id()]);

        $this->post('/admin/question', $question->toArray());

        $response = $this->patch("/admin/question/{$question->id}", [
            'text' => 'Changed',
            'notes' => 'Changed Notes',
            'quiz_id' => 1,
            'answer_type_id' => 1
        ]);

        $this->get('/admin/question')->assertSee('Changed');
    }

    /** @test */
    public function aLoggedInUserCanSeeTheEditForm () {
        $this->actingAs(factory(\App\User::class)->create());

        $this->get('/admin/question/create')->assertSee('Question');
    }

    /** @test */
    public function itCanBeDeleted () {
        $this->actingAs(factory(\App\User::class)->create());

        $question = factory(\App\Question::class)->create(['updated_by_user_id' => auth()->id()]);

        // delete the post
        $this->json('DELETE', "/admin/question/{$question->id}");

        $this->assertDatabaseMissing('question', $question->toArray());
    }
}