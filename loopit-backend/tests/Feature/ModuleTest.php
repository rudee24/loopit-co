<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\CreatesApplication;

class ModuleTest extends TestCase
{

    use CreatesApplication;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    protected function authenticate()
    {
        User::create([
            'name' => 'Test',
            'email' => $email = 'test@example.com',
            'password' => $password = Hash::make("123456789")
        ]);

        if (!auth()->attempt(['email' => $email, 'password' => '123456789'])) {
            return response(['message' => 'Login credentials are invaild']);
        }

        return $accessToken = auth()->user()->createToken('authToken')->accessToken;
    }

    public function test_get_cars_after_login()
    {
        $token = $this->authenticate();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('GET', 'api/cars');

        $response->assertStatus(200);

        User::where('email', 'test@gmail.com')->delete();
    }
}
