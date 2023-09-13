<?php

namespace Tests\Feature\Month;

use App\Models\Card;
use App\Models\Month;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateMonthTest extends TestCase
{
    use RefreshDatabase;

     public function test_it_create_months()
     {
          
        $user = $this->createUser();

        $card = New Card([
            'user_id' => $user->id
        ]);
        $card->save();

        $data = [
            'name' => 'Janeiro',
            'valor' => 20,00,
        ];

        $response = $this->actingAs($user)->postJson("api/v1/cards/$card->id/months", $data);

        $response->assertCreated();

        // $response->assertJsonCount(2, 'data');
        // $response->assertJson(['data' => [
        //     ['avatar' => null],
        //     ['avatar' => 'http:localhost/storage/avat'],
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
