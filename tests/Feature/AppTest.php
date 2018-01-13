<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AppTest extends TestCase
{
    use DatabaseMigrations;
    
    /** @test */
    public function aUserCanViewHome()
    {
        $user = factory(\App\User::class)->create();
            
        $response = $this->actingAs($user)->get('/');

        $response->assertStatus(200);
    }
}
