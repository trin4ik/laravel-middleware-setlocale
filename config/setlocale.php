<?php

return [
	'default' => env('SET_LOCALE_DEFAULT', 'en'),
	'methods' => [
		'allow' => env('SET_LOCALE_METHODS', 'header'), // methods from "allow" that works. can be separated by commas, the last method gets the highest priority
		'exist' => [
			'user' => env('SET_LOCALE_METHOD_USER', 'locale'), // eloquent column in user like auth()->user()->locale
			'header' => env('SET_LOCALE_METHOD_HEADER', 'x-locale'), // http header like HTTP_X_LOCALE=en
			'get' => env('SET_LOCALE_METHOD_GET', 'locale'), // get param like "/?locale=en"
			'post' => env('SET_LOCALE_METHOD_POST', 'locale') // post field like $request->post('locale')
		]
	],
	'allow' => env('SET_LOCALE_ALLOW', 'en,ru') // allowed locales. others set the default
];