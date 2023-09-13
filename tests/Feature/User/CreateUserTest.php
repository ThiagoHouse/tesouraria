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

class CreateUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_create_users()
    {
        // prepare
        $user = $this->createUser();

        $user2 = new User([
            'name' => 'dev',
            'email' => 'email@example.com',
        ]);

        $data = [
            'name' => 'Thiago',
            'email' => 'thiago@gmail.com',
            'password' => bcrypt('12345678')
        ];

        // act
        $response = $this->actingAs($user)->postJson('/api/v1/users', $data);

        // check
        $response->assertStatus(201);
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
