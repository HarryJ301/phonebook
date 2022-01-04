<?php

namespace Tests\Feature;

use App\Models\Number;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class NumberTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_numbers()
    {
        $response = $this->get('/numbers');
        $response->assertOk();

        $response->assertViewIs('numbers.index');

        $current_user = optional(Auth::user())->id;

        $expectedPage1NameData = Number::orderBy('created_at')->where('user_id',$current_user)->paginate(30)
            ->take(20)
            ->pluck('phone_number');

        $response->assertSeeInOrder(array_merge([
            'All of your numbers'
        ], $expectedPage1NameData->toArray()));

    }

    public function test_create_numbers()
    {
        $response = $this->get('/numbers/create');

        $response->assertStatus(200);
    }
}
