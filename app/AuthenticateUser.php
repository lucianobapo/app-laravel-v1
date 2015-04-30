<?php namespace App;

use App\Repositories\UserRepository;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Laravel\Socialite\Contracts\Factory as Socialite;

class AuthenticateUser {

    //use AuthenticatesAndRegistersUsers;

    /**
     * @var UserRepository
     */
    private $users;
    /**
     * @var Socialite
     */
    private $socialite;
    /**
     * @var Authenticatable
     */
    private $auth;
    /**
     * @var Registrar
     */
    private $registrar;

    public function __construct(UserRepository $users, Socialite $socialite, Guard $auth, Registrar $registrar){
//    public function __construct(UserRepository $users, Socialite $socialite, Authenticatable $auth){

        $this->users = $users;
        $this->socialite = $socialite;
        $this->auth = $auth;
        $this->registrar = $registrar;
    }

    /**
     * @param $hasCode
     * @param SocialAuthListener $listener
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function execute($hasCode, SocialAuthListener $listener){
        if (!$hasCode) return $this->getAuthorizationFirst();

        $user = $this->getGitHubUser();

        $validator = $this->registrar->validator($user);

        if ($validator->fails())
        {
            dd($validator);
        }

        $createUser = $this->registrar->create($user);
        //dd($createUser);
//        $user = $this->users->findByUsernameOrCreate($this->getGitHubUser());
        $this->auth->login($createUser, true);

        return $listener->userHasLoggedIn($createUser);
//        dd($user);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    private function getAuthorizationFirst(){
        return $this->socialite->driver('github')->redirect();
    }

    private function getGitHubUser(){
        $userData = $this->socialite->driver('github')->user();
        return [
//            'mandante' => 'teste',
            'name' => $userData->name,
            'email' => $userData->email,
            'avatar' => $userData->avatar,
            'password' => $userData->id,
            'password_confirmation' => $userData->id,
        ];
    }
}