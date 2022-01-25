<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\TestCase;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\CreatesApplication;

class CarTest extends TestCase
{
    use CreatesApplication;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testLogin()
    {
        // Creating Users
        User::create([
            'name' => 'Test',
            'email' => $email = time() . '@example.com',
            'password' => $password = Hash::make("123456789")
        ]);

        // Simulated landing
        $response = $this->json('POST', 'api/login', [
            'email' => $email,
            'password' => "123456789",
        ]);

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        // Determine whether the login is successful and receive token 
        $response->assertStatus(200);

        //$this->assertArrayHasKey('token',$response->json());

        // Delete users
        User::where('email', $email)->delete();
    }

    public function test_get_cars_without_login()
    {
        $response = $this->json('GET', 'api/cars');

        // Determine whether the response is unauthorized
        $response->assertStatus(401);
    }
}
