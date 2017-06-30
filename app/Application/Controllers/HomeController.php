<?php

namespace App\Application\Controllers;


use App\Application\Model\Page;
use App\Application\Model\User;
use App\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['getPageBySlug', 'welcome', 'redirectToProvider', 'handleProviderCallback']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('website.home');
    }

    public function getPageBySlug($slug)
    {
        $page = Page::where('slug', $slug)->first();
        if ($page) {
            return view('website.page', compact('page'));
        }
        return redirect('404');
    }

    public function welcome()
    {
        $page = Page::select('title', 'slug')->where('slug', 'about_us')->first();
        return view('website.welcome', compact('page'));
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        $selectProvider = Provider::where('provider_id', $user->getId())->first();
        if (!$selectProvider) {
            //new user
            $userGetReal = User::where('email', $user->getEmail())->first();
            if (!$userGetReal) {
                //new Real User
                $userGetReal = new User();
                $userGetReal->email = $user->getEmail();
                $userGetReal->name = $user->getName();
                $userGetReal->password=bcrypt(str_random(6));
                $userGetReal->group_id=1;
                $userGetReal->save();
                //$userGetReal->save();
            }
            $newprovider = new Provider();
            $newprovider->provider_id = $user->getId();
            $newprovider->provider = $provider;
            $newprovider->user_id = $userGetReal->id;
            $newprovider->save();
        } else {
            $userGetReal = User::find($selectProvider->user_id);
        }
        $userGetReal = User::find($userGetReal->id);
        Auth::login($userGetReal);

        return redirect('/home');
    }
}
