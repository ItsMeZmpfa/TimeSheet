<?php

namespace tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginUserApiTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    public function testLoginUser()
    {
        $response = $this->postJson(route('login',
            ['email' => $this->user->email, 'password' => 'Test12341234']))->assertStatus(201);

        //Expect json Response with Json Structure
        $response->assertJsonStructure([
            'token',
        ]);
    }

    public function testLoginUserWithWrongPassword()
    {

        $response = $this->postJson(route('login',
            ['email' => $this->user->email, 'password' => '12341234Test']))->assertStatus(401);


        //Expect json Response with Json Structure
        $response->assertJsonFragment([
            'message' => 'Unauthorized',
        ]);
    }

    public function testLoginUserWithWrongEmail()
    {

        $response = $this->postJson(route('login',
            ['email' => 'blabla@test.de', 'password' => 'Test12341234']))->assertStatus(401);

        $response->assertJsonFragment([
            'message' => 'Unauthorized',
        ]);
    }

    public function testLoginUserWithEmptyEmail()
    {

        $response = $this->postJson(route('login',
            ['email' => '', 'password' => 'Test12341234']))->assertStatus(422);

        $response->assertJsonFragment([
            "error" => "Something went wrong with Input Your provide",
            "help" => "Check if the given input is valid"
        ]);
    }

    public function testLoginUserWithEmptyPasswordAndMinimalEmail()
    {

        $response = $this->postJson(route('login',
            ['email' => $this->user->email, 'password' => '1234121']))->assertStatus(422);

        $response->assertJsonFragment([
            "error" => "Something went wrong with Input Your provide",
            "help" => "Check if the given input is valid"
        ]);

        $response = $this->postJson(route('login',
            ['email' => $this->user->email, 'password' => '']))->assertStatus(422);

        $response->assertJsonFragment([
            "error" => "Something went wrong with Input Your provide",
            "help" => "Check if the given input is valid"
        ]);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = $this->createUser();
    }

    private function createUser()
    {
        return User::factory()->create();
    }
}
