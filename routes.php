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


Route::get('/away', function ()
{
	return view('jetweb::technical_pages.away');
});

Route::get('/lk', [
	'middleware' => 'auth',
	'uses' => '\App\Http\Controllers\UserController@showLk'
]);

Route::get('/profile/{id}', '\App\Http\Controllers\UserController@showProfile');

Route::post('/comment/add', '\App\Http\Controllers\CommentController@postAdd');
Route::any('/comment/remove/{id}', '\App\Http\Controllers\CommentController@postRemove');