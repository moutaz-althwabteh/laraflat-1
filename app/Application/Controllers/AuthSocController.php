<?php

use Laravel\Socialite\Facades\Socialite;

class AuthSocController extends \App\Application\Controllers\Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        dd($user);
    }
}
