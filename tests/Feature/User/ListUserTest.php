<?php

namespace Tests\Feature\User;

use App\Enums\RoleType;
use App\Institution;
use App\Role;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Tests\TestCase;

class ListUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_returns_200_and_data_when_listing_users()
    {
        // prepare
        $user = $this->createUser();

        $user2 = new User([
            'name' => 'dev',
            'email' => 'email@example.com',
        ]);

        $user2->password = bcrypt('123456');
        $user2->save();

        // act
        $response = $this->actingAs($user)->getJson('/v1/users');

        $response->dump();

        // check
        $response->assertStatus(200);
        // $response->assertJsonCount(2, 'data');
        // $response->assertJson(['data' => [
        //     ['avatar' => null],
        //     ['avatar' => 'http://localhost/storage/avat'],
        // ]]);
    }

    protected function createUser()
    {
        $user = new User([
            'name' => 'joao',
            'email' => 'joao@example.com'
        ]);
        $user->password = bcrypt('password123');
        $user->save();

        return $user;
    }
}
