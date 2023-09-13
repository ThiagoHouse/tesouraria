<?php

namespace Tests\Feature\Card;

use App\Models\Card;
use App\Models\Month;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetCardTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_get_card()
    {
        $user = $this->createUser();

        $user2 = User::create([
            'name' => 'thiago', 
            'email' => 'thiago@gmail.com', 
            'password' => bcrypt('12345678')
        ]);
    
        $card = Card::create([
            'user_id' => $user2->id
        ]);
        $card->save();

        // $month = Month::create([
        //     'name' => 'janeiro',
        //     'valor' => 20
        // ]);

        // $card->months()->save($month);

        $response = $this->actingAs($user)->getJson("api/v1/cards/$card->id");
        //$response->dump();

        $response->assertOk();
        // $response->assertJsonCount(2, 'data');
        // $response->assertJson(['data' => [
        //     ['avatar' => null],
        //     ['avatar' => 'http://localhost/storage/avat'],
        // ]]);
    }

    public function test_it_get_card_with_months()
    {
        $user = $this->createUser();

        $user2 = User::create([
            'name' => 'thiago', 
            'email' => 'thiago@gmail.com', 
            'password' => bcrypt('12345678')
        ]);
    
        $card = Card::create([
            'user_id' => $user2->id
        ]);

        $month = new Month([
            'name' => 'janeiro',
            'valor' => 20
        ]);

        $month2 = new Month([
            'name' => 'fevereiro',
            'valor' => 30
        ]);

        $card->months()->save($month);
        $card->months()->save($month2);

        $response = $this->actingAs($user)->getJson("api/v1/cards/$card->id?with=months");

        $response->assertOk();
        $response->assertJson([
            "id" => $card->id,
            "user_id" => $user2->id,
            "months" => [
                [
                    "id" => 1,
                    "name" => "janeiro",
                    "valor" => "20.00",
                    "card_id" => 3,
                ],
                [
                    "id" => 2,
                    "name" => "fevereiro",
                    "valor" => "30.00",
                    "card_id" => 3,
                ]
            ]
        ]);
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
