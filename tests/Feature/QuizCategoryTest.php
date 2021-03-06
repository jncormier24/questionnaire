<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\QuizCategory;
use Illuminate\Support\Facades\App;

class QuizCategoryTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function itCanBeSeenByLoggedInUser () {
        $this->actingAs(factory(\App\User::class)->create());

        $quizCat = factory(\App\QuizCategory::class)->create();

        $this->get('/admin/quizcategory')->assertSee($quizCat->name);
    }

    /** @test */
    public function itsCreateFormCanBeSeenByALoggedInUser () {
        $this->actingAs(factory(\App\User::class)->create());

        $this->get('/admin/quizcategory/create')->assertSee('Create Quiz Category');
    }

    /** @test */
    public function itCanBeCreatedByALoggedInUser () {
        $this->actingAs(factory(\App\User::class)->create());

        $quizCat = factory(\App\QuizCategory::class)->make();

        $this->post('/admin/quizcategory', $quizCat->toArray());

        $this->get('/admin/quizcategory')->assertSee($quizCat->name);
    }

    /** @test */
    public function itCanBeEditedByAUser () {
        $this->be($user = factory(\App\User::class)->create());

        $quizcategory = factory(\App\QuizCategory::class)->create();

        $this->post('/admin/quizcategory', $quizcategory->toArray());

        $quizcategory->name = 'Changed';

        $response = $this->patch("/admin/quizcategory/{$quizcategory->id}", $quizcategory->toArray());

        $this->get('/admin/quizcategory')->assertSee('Changed');
    }

    /** @test */
    public function aLoggedInUserCanSeeTheEditForm () {
        $this->be(factory(\App\User::class)->create());

        $quizcat = factory(\App\QuizCategory::class)->create();

        $this->get("/admin/quizcategory/{$quizcat->id}/edit")->assertSee('Edit Quiz Category');
    }

    /** @test */
    public function itCanBeDeleted () {
        $this->be(factory(\App\User::class)->create());

        $quizcategory = factory(\App\QuizCategory::class)->create();

        // delete the post
        $this->json('DELETE', "/admin/quizcategory/{$quizcategory->id}");

        $this->assertDatabaseMissing('quiz_category', $quizcategory->toArray());
    }
}