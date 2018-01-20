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

        $this->post('/question', $question->toArray());

        $this->get('/question')->assertSee($question->text);
    }

    /** @test */
    public function itCanBeViewedByAUser () {
        $this->actingAs(factory(\App\User::class)->create());

        $question = factory(\App\Question::class)->create(['updated_by_user_id' => auth()->id()]);

        $this->post('/question', $question->toArray());

        $this->get("/question/{$question->id}/edit")->assertSee($question->text);
    }

    /** @test */
    public function itCanBeUpdatedByALoggedInUser () {
        $this->actingAs(factory(\App\User::class)->create());

        $question = factory(\App\Question::class)->create(['updated_by_user_id' => auth()->id()]);

        $this->post('/question', $question->toArray());

        $this->patch("/question/{$question->id}", [
            'text' => 'Changed',
            'notes' => 'Changed Notes',
            'answer_type_id' => 0
        ]);

        $this->get('/question')->assertSee('Changed');
    }

    /** @test */
    public function aLoggedInUserCanSeeTheEditForm () {
        $this->actingAs(factory(\App\User::class)->create());

        $this->get('/question/create')->assertSee('Question');
    }

    /** @test */
    public function itCanBeDeleted () {
        $this->actingAs(factory(\App\User::class)->create());

        $question = factory(\App\Question::class)->create(['updated_by_user_id' => auth()->id()]);

        // delete the post
        $this->json('DELETE', "/question/{$question->id}");

        $this->assertDatabaseMissing('question', $question->toArray());
    }
}