<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;

class AuthTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * Check auth failed with invalid credentials
     *
     * @return void
     */
    public function testAuthFailed()
    {
        $this->visit('/login')
            ->submitForm('Войти', [
                'email' => 'me@example.com',
                'password' => 'secret'
            ])
            ->see(trans('auth.failed'));
    }

    public function testAuthSuccess()
    {
        $userPassword = 123456;

        $user = factory(User::class)
            ->create();

        $this->visit('/login')
            ->submitForm('Войти', [
                'email' => $user->email,
                'password' => $userPassword
            ])
            ->dontSee(trans('auth.failed'))
            ->see($user->name);
        
    }
}
