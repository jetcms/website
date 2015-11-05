<?php

Route::controllers([
	'auth' => '\App\Http\Controllers\Auth\AuthController',
	'password' => '\App\Http\Controllers\Auth\PasswordController',
]);

Route::get('form/{name}', '\App\Http\Controllers\MailController@getMailController');
Route::post('form/{name}', '\App\Http\Controllers\MailController@postMailController');
Route::any('form/{name}/success', '\App\Http\Controllers\MailController@anySuccess');

Route::any('sitemap.xml', '\App\Http\Controllers\SitemapController@anyGenerate');
Route::any('feed', '\App\Http\Controllers\FeedController@anyGenerate');

/*
Route::controller('/', config('jetcms.setting.page_controller','JetCMS\Website\Controllers\PageController'),[
	'getIndex' => 'home',
]);
*/
/*
Route::controller('/', '\App\Http\Controllers\PageController',[
	'getIndex' => 'home',
]);