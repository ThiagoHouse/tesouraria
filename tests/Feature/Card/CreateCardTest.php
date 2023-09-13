<?php

namespace Tests\Feature\Card;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateCardTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_create_card()
    {
        $user = $this->createUser();

        $user2 = User::create([
            'name' => 'thiago', 
            'email' => 'thiago@gmail.com', 
            'password' => bcrypt('12345678')
        ]);

        $user2->save();
    
        $data = [
            'user_id' => $user2->id
        ];

        $response = $this->actingAs($user)->postJson('api/v1/cards', $data);
        //$response->dump();

        $response->assertCreated();
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
