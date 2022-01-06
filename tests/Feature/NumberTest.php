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

    public function test_user_not_authorised() {
        $response = $this
            ->followingRedirects()
            ->get('/numbers');

        $response->assertViewIs('auth.login');
    }

    public function test_wrong_user_cannot_see_contacts() {
        $user = User::factory()->create();
        $number = Number::factory()->create([
            'user_id' => $user->id
        ]);
        $wrongUser = User::factory()->create();

        $response = $this
            ->followingRedirects()
            ->actingAs($wrongUser)
            ->get("/numbers/{$number->id}");

        $response->assertForbidden();
    }

    public function test_update_authorised_wrong_user_receives_403() {
        $newNumber = '0123456789';
        $user = User::factory()->create();
        $number = Number::factory()->create([
            'user_id' => $user->id
        ]);
        $wrongUser = User::factory()->create();

        $response = $this
            ->followingRedirects()
            ->actingAs($wrongUser)
            ->put("/number/{$number->id}", [
                'phone_number' => $newNumber
            ]);

        $latestNumber = $number->fresh();

        $response->assertForbidden();
        $this->assertNotEquals($latestNumber->phone_number, $newNumber);
    }

    public function test_update_incomplete_data_fails_validation() {
        $newNumber = '';
        $user = User::factory()->create();
        $number = Number::factory()->create([
            'user_id' => $user->id
        ]);

        $response = $this
            ->actingAs($user)
            ->put("/number/{$number->id}", [
                'phone_number' => $newNumber
            ]);

        $latestNumber = $number->fresh();

        $response->assertSessionHasErrors([
            'phone_number' => 'The number field is required.'
        ]);
        $this->assertNotEquals($latestNumber->phone_number, $newNumber);
    }

    public function user_search_function_success() {
        $user = User::factory()->create();
        $number = Number::factory()->create([
            'user_id' => $user->id
        ]);
        $search = $number -> get('first_name');

        $response = $this
            ->actingAs($user)
            ->put("/number/{$number->id}", [
                    'first_name' => $search
            ]);
        $response->assertStatus(200);
    }

}
