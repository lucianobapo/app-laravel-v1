<?php namespace App\Http\Controllers;

use App\AuthenticateUser;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\SocialAuthListener;
use Illuminate\Http\Request;

class SocialAuthController extends Controller implements SocialAuthListener
{

    /**
     * @param AuthenticateUser $authenticateUser
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function login(AuthenticateUser $authenticateUser, Request $request){
        return $authenticateUser->execute($request->has('code'), $this );
//        return \Socialite::with('github')->redirect();
	}

    /**
     * @param $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function userHasLoggedIn($user) {
        return redirect('github');
    }
}
