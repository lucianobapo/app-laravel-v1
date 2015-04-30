<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('twitter/{query}', function($query) {
    $tweets = Twitter::search($query);
    dd($tweets);
//    return Twitter::search($query);

});

Route::get('github', function() {
    if (Auth::guest()) return 'Hi guest. '.link_to('login', 'Login With Github!');
    else return 'Welcome back, '.Auth::user()->name;
});

Route::get('login', 'SocialAuthController@login');

Route::get('github/{username}', function($username) {
    $client = new \Guzzle\Http\Client('https://api.github.com');
    $response = $client->get("users/$username")->send();
    dd($response->json());
});

//after filter
//Route::filter('log', function($route,$request,$response){
//    //var_dump($route);
//    //var_dump($request);
//    //var_dump($response);
//});

Route:get('foo', 'FooController@foo');
//Route:get('foo', 'FooController@foo')->after('log');

// Temporário
Route::get('relatorios', ['as'=>'relatorios.index', 'uses'=>'RelatoriosController@index']);

Route::get('/', ['as'=>'index', 'uses'=>'WelcomeController@index']);

Route::get('home', ['as'=>'home.index', 'uses'=>'HomeController@index']);

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('contact', ['as'=>'contact', 'uses'=>'PagesController@contact']);

Route::get('about', ['as'=>'about', 'uses'=>'PagesController@about']);

//Route::get('articles', 'ArticlesController@index');
//Route::get('articles/create', 'ArticlesController@create');
//Route::get('articles/{id}', 'ArticlesController@show');
//Route::post('articles', 'ArticlesController@store');
//Route::get('articles/{id}/edit', 'ArticlesController@edit');

Route::resource('articles','ArticlesController', [
    'names' => [
        'index'=>'articles.index',
        'show'=>'articles.show',
        'create'=>'articles.create',
        'store'=>'articles.store',
        'edit'=>'articles.edit',
        'update'=>'articles.update',
    ],
    'only'=>[
        'index',
        'show',
        'create',
        'store',
        'edit',
        'update',
    ],
]);

Route::get('tags/{tags}', ['as'=>'tags.show', 'uses'=>'TagsController@show']);

Route::resource('sharedCurrencies','SharedCurrenciesController', [
    'names' => [
        'index'=>'sharedCurrencies.index',
        'show'=>'sharedCurrencies.show',
//        'create'=>'articles.create',
//        'store'=>'articles.store',
//        'edit'=>'articles.edit',
//        'update'=>'articles.update',
    ],
    'only'=>[
        'index',
        'show',
//        'create',
//        'store',
//        'edit',
//        'update',
    ],
]);