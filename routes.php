<?php

Route::controllers([
	'auth' => 'App\Http\Controllers\Auth\AuthController',
	'password' => 'App\Http\Controllers\Auth\PasswordController',
]);

Route::bind('model_page_alias', function($value)
{
    $page = App\Page::where('alias', $value)->first();
    if ($page)
    {
    	return $page;
    }
    else
    {
    	throw new Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
    }    
});

Route::post('/mail/{name?}', function ($name) {

	$form = App\Form::where(['name'=>$name])->first();

	if ($form)
	{
		Mail::send('emails.key_val', array('inner' => Input::all()), function($message) use ($form)
		{
		    $message->to('52018@bk.ru', 'Алексей')->subject($form->lable);
		});
	}
	else
	{
		Mail::send('emails.key_val', array('inner' => Input::all()), function($message) use ($form)
		{
		    $message->to('52018@bk.ru', 'Алексей')->subject($form->lable);
		});
	}	

	return response()->json(['title'=>'Спасибо!','content'=>'Наши менеджеры свяжутся с Вами']);
});

/**
 * Page
 */

Route::get('/', [
	'uses' => 'JetCMS\Website\Controllers\PageController@index', 
	'as' => 'home'
]);
/*

if (in_array(Request::path(), ['/',null,'']))
{
	$page = App\Page::whereIn('alias',['/',null,''])->first();
	if ($page)
	{
		$page->setActivePage();
	}
}
else
{
	$page = App\Page::where(['alias'=>Request::path()])->with('menu')->first();
	if ($page)
	{
		$page->setActivePage();
		Route::get(Request::path(), [
			'uses' => 'JetCMS\Website\Controllers\PageController@alias', 
			'as' => 'page'
		]);	
	}
}
*/
Route::bind('page', function($value)
{
	$page = App\Page::where('alias', $value)->first();
	if ($page)
	{
		return $page;
	}
	throw new Symfony\Component\HttpKernel\Exception\NotFoundHttpException();
});

Route::get('{page}', [
	'uses' => 'JetCMS\Website\Controllers\PageController@alias', 
	'as' => 'page'
]);
/*
Route::get('{page}', function(App\Page $page)
{
	$page->setActivePage();
    if ($page->menu)
    {
    	App\Menu::setActiveMenuObject($page->menu);
	}
    return view('tpl.page.'.$page->template,['page'=>$page->toArray()]);
});
*/