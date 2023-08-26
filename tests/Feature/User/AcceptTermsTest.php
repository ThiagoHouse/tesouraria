<?php

namespace Tests\Feature\One\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AcceptTermsTest extends TestCase
{
    use RefreshDatabase;

    // public function test_can_accept_terms()
    // {
    //     // arrange
    //     $user = $this->createAuthUser();
    //     $user->should_accept_terms = true;
    //     $user->save();

    //     // act
    //     $response = $this->actingAs($user)->postJson('/v1/me/accept-terms');

    //     // assert
    //     $response->assertOk();

    //     // Assert that password wasnt modified
    //     $user->refresh();
    //     $this->assertFalse($user->should_accept_terms);
    // }
}
