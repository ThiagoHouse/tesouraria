<?php

namespace Tests\Feature\Month;

use App\Models\Month;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ListMonthTest extends TestCase
{
    use RefreshDatabase;

    // public function test_it_lists_months()
    // {
    //     // prepare
    //     $user = $this->createUser();

    //     $month = new Month([
    //         'name' => 'Janeiro',
    //         'valor' => 20,00
    //     ]);
    //     $month->save();

    //     $month2 = new Month([
    //         'name' => 'Fevereiro',
    //         'valor' => 25,00
    //     ]);
    //     $month2->save();

    //     // act
    //     $response = $this->actingAs($user)->getJson('api/v1/months');

    //     // check
    //     $response->assertOk();
    //     // $response->assertJsonCount(2, 'data');
    //     // $response->assertJson(['data' => [
    //     //     ['avatar' => null],
    //     //     ['avatar' => 'http://localhost/storage/avat'],
    //     // ]]);
    // }

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
