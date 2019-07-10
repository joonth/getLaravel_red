<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function execute(Request $request, $provider){
        if(! $request ->has('code')){
            return $this -> redirectToProvider($provider);
        }

        return $this->handleProviderCallback($provider);
    }

    public function redirectToProvider($provider){
        return \Socialite::drvier($provider)->redirect();
    }

    protected function handleProviderCallback($provider){
        $user = \Socialite::driver($provider)->user();
        dd($user);
    }
}
