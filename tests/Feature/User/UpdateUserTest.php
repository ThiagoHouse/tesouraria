<?php

namespace Tests\Feature\One\User;

use App\Enums\Gender;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Tests\TestCase;

class UpdateUserTest extends TestCase
{
    use RefreshDatabase;

    // public function test_it_doesnt_requires_passwords()
    // {
    //     // arrange
    //     $user = $this->createAuthUser();

    //     $data = [
    //         'name' => 'joao',
    //     ];

    //     // act
    //     $response = $this->actingAs($user)->putJson('/v1/me', $data);

    //     // assert
    //     $response->assertOk();

    //     // Assert that password wasnt modified
    //     $updatedUser = User::find($user->id);
    //     $this->assertTrue(Hash::check('password123', $updatedUser->password));
    // }

    // public function test_it_first_access()
    // {
    //     // arrange
    //     $user = $this->createAuthUser();

    //     $data = [
    //         'is_first_access' => false,
    //     ];

    //     // act
    //     $response = $this->actingAs($user)->putJson('/v1/me', $data);

    //     // assert
    //     $response->assertOk();

    //     // Assert that password wasnt modified
    //     $this->assertDatabaseHas('users', [
    //         'is_first_access' => false,
    //     ]);
    // }

    // public function test_it_updates_the_nickname()
    // {
    //     // arrange
    //     $user = $this->createAuthUser();

    //     $data = [
    //         'nickname' => 'Rei do Cs',
    //     ];

    //     // act
    //     $response = $this->actingAs($user)->putJson('/v1/me', $data);

    //     // assert
    //     $response->assertOk();

    //     // Assert that password wasnt modified
    //     $this->assertDatabaseHas('users', [
    //         'nickname' => 'Rei do Cs',
    //     ]);
    // }

    // public function test_it_updates_the_is_first_access()
    // {
    //     // arrange
    //     $user = $this->createAuthUser();
    //     $user->is_first_access = false;
    //     $user->save();

    //     $data = [
    //         'is_first_access' => true,
    //     ];

    //     // act
    //     $response = $this->actingAs($user)->putJson('/v1/me', $data);

    //     // assert
    //     $response->assertOk();

    //     // Assert that is_first_access was modified
    //     $user->refresh();
    //     $this->assertDatabaseHas('users', [
    //         'is_first_access' => true,
    //     ]);
    // }

    // public function test_return_of_the_absolute_path_of_the_avatar_url()
    // {
    //     // arrange
    //     $user = $this->createAuthUser();

    //     $img = UploadedFile::fake()->image('image_one.jpg');
    //     $hash = Str::random(40);
    //     $path = "avatars/$hash.jpg";
    //     Storage::disk('public')->put($path, $img);
    //     $user->avatar = $path;

    //     $data = [
    //         'avatar' => $user->avatar,
    //     ];

    //     // act
    //     $response = $this->actingAs($user)->putJson('/v1/me', $data);

    //     // assert
    //     $response->assertOk();

    //     $response->assertJson([
    //         'data'=> [
    //             'id' => $user->id,
    //             'avatar' =>  asset(Storage::url($user->avatar)),
    //         ],
    //     ]);
    // }

    // public function test_it_return_422_when_nickname_is_empty()
    // {
    //     // arrange
    //     $user = $this->createAuthUser();

    //     $data = ['nickname' => ''];

    //     // act
    //     $response = $this->actingAs($user)->putJson('/v1/me', $data);

    //     // assert
    //     $response->assertStatus(422);

    //     $this->assertDatabaseMissing('users', ['nickname' => '']);
    // }

    // public function test_it_genders_choice()
    // {
    //     // arrange
    //     $user = $this->createAuthUser();

    //     $data = [
    //         'gender' => Gender::Male,
    //     ];

    //     // act
    //     $response = $this->actingAs($user)->putJson('/v1/me', $data);

    //     // assert
    //     $response->assertOk();

    //     // Assert that password wasnt modified
    //     $this->assertDatabaseHas('users', [
    //         'id' => $user->id,
    //         'gender' => Gender::Male,
    //     ]);
    // }

    // public function test_it_records_date_of_birth()
    // {
    //     // arrange
    //     $user = $this->createAuthUser();

    //     $data = [
    //         'birth_date' => '1987-06-10',
    //     ];

    //     // act
    //     $response = $this->actingAs($user)->putJson('/v1/me', $data);

    //     // assert
    //     $response->assertOk();

    //     // Assert that password wasnt modified
    //     $this->assertDatabaseHas('users', [
    //         'id' => $user->id,
    //         'birth_date' => '1987-06-10',
    //     ]);
    // }

    // public function test_it_registers_the_phone_number()
    // {
    //     // arrange
    //     $user = $this->createAuthUser();

    //     $data = [
    //         'phone' => '(21)91111-1111',
    //     ];

    //     // act
    //     $response = $this->actingAs($user)->putJson('/v1/me', $data);

    //     // assert
    //     $response->assertOk();

    //     // Assert that password wasnt modified
    //     $this->assertDatabaseHas('users', [
    //         'id' => $user->id,
    //         'phone' => '(21)91111-1111',
    //     ]);
    // }

    // /**
    //  * @test
    //  */
    // public function test_it_validates_passwords_when_present()
    // {
    //     // arrange
    //     $user = $this->createAuthUser();

    //     $data = [
    //         'name' => 'bob',
    //         'email' => 'bob@example.com',
    //         'password' => '',
    //         'status' => 0,
    //         'nickname' => 'sr das estrelas',
    //         'is_first_access' => false,
    //     ];

    //     // act
    //     $response = $this->actingAs($user)->putJson('/v1/me', $data);

    //     // assert
    //     $response->assertStatus(422);

    //     $response->assertJsonValidationErrors('password');

    //     // Assert that password wasnt modified
    //     $updatedUser = User::find($user->id);
    //     $this->assertTrue(Hash::check('password123', $updatedUser->password));
    // }

    // public function test_it_changes_password()
    // {
    //     // arrange
    //     $user = $this->createAuthUser();

    //     $data = [
    //         'password' => 'password123',
    //         'new_password' => 'newpassword',
    //     ];

    //     // act
    //     $response = $this->actingAs($user)->putJson('/v1/me', $data);

    //     // assert
    //     $response->assertOk();

    //     // Assert that password was modified
    //     $this->assertTrue(Hash::check('newpassword', $user->refresh()->password));
    // }

    // public function test_it_update_temporary_password()
    // {
    //     // arrange
    //     $user = $this->createAuthUser();
    //     $user->should_change_password = 1;
    //     $user->save();

    //     $data = [
    //         'new_password' => 'newpassword',
    //     ];

    //     // act
    //     $response = $this->actingAs($user)->postJson('/v1/me/update-temporary-password', $data);

    //     // assert
    //     $response->assertOk();

    //     // Assert that password was modified
    //     $this->assertTrue(Hash::check('newpassword', $user->refresh()->password));
    // }

    // public function test_it_checks_current_password()
    // {
    //     // arrange
    //     $user = new User([
    //         'name' => 'alex',
    //         'nickname' => 'alex',
    //         'email' => 'alex@example.com',
    //         'status' => 1,
    //         'is_first_access' => true,
    //     ]);
    //     $user->password = bcrypt('alex1234');
    //     $user->save();

    //     $data = [
    //         'password' => 'wrongpassword',
    //         'new_password' => 'newpassword',
    //     ];

    //     // act
    //     $response = $this->actingAs($user)->putJson('/v1/me', $data);

    //     // assert
    //     $response->assertStatus(422)
    //         ->assertJsonValidationErrors('password');

    //     // Assert that password wasn't modified
    //     $this->assertTrue(Hash::check('alex1234', $user->refresh()->password));
    // }

    // public function test_it_verifies_that_the_new_email_is_valid()
    // {
    //     // arrange
    //     $user = new User([
    //         'name' => 'alex',
    //         'nickname' => 'alex',
    //         'email' => 'alex@example.com',
    //         'status' => 1,
    //         'is_first_access' => true,
    //     ]);
    //     $user->password = bcrypt('alex1234');
    //     $user->save();

    //     $data = ['email' => 'alex.santosexample.com'];

    //     // act
    //     $response = $this->actingAs($user)->putJson('/v1/me', $data);

    //     // check
    //     $response->assertStatus(422)->assertJsonValidationErrors('email');

    //     // Assert that e-mail wasn't modified
    //     $this->assertNotEquals('alex.santosexample.com', $user->refresh()->email);
    // }
}
