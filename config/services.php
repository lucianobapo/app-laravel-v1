<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => [
		'domain' => '',
		'secret' => '',
	],

	'mandrill' => [
		'secret' => '',
	],

	'ses' => [
		'key' => '',
		'secret' => '',
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model'  => 'App\User',
		'secret' => '',
	],

    /**
     * Social OAuth
     */
    'github' => [
        'client_id' => env('GITHUB_CLIENT_ID', 'your-github-app-id'),
        'client_secret' => env('GITHUB_CLIENT_SECRET', 'your-github-app-secret'),
        'redirect' => env('GITHUB_REDIRECT', 'http://your-callback-url'),
    ],

    'twitter' => [
        'consumer_key' => env('TWITTER_CONSUMER_KEY', 'consumer_key'),
        'consumer_secret' => env('TWITTER_CONSUMER_SECRET', 'consumer_secret'),
        'token' => env('TWITTER_TOKEN', 'token'),
        'token_secret' => env('TWITTER_TOKEN_SECRET', 'token_secret'),
    ],

];
