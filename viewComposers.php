<?php
View::composer('jetweb::widgets.menu.top', function($view)
{

	$menu = Cache::remember( 'active_menu_root', config('jetcms.web.cache_time'), function()
   	{
		return App\Menu::where(['parent_id'=>null])->get();
	});

	$view->with('menu', $menu);
});

View::composer('jetweb::widgets.menu.level', function($view)
{
	$m = App\Menu::getActiveLevel();
	$menu = [];
	foreach ($m as $key => $val) 
	{
		$menu[] = $val->toArray();
	}
	$view->with('menu_level', $menu);
});

View::composer('jetweb::widgets.menu.tree', function($view)
{
	$tree = App\Menu::getTree();
	$view->with('menu_tree', $tree);
});

View::composer('jetweb::widgets.menu.breadcrumbs', function($view)
{
	$breadcrumbs = [];
	if(App\Menu::getActiveMenuRootId())
	{
	  	$breadcrumbs[] = App\Menu::getActiveMenuRoot()->toArray();
	}


	$rows = App\Menu::getActiveLevel();

	foreach ($rows as $key => $row) 
	{
		foreach ($row as $key => $val) 
		{
			if ($val['is_active'] == true)
			{
				$breadcrumbs[] = $val->toArray();
			}
		}
		
	}

	$view->with('menu_breadcrumbs', $breadcrumbs);
});

View::composer('jetweb::widgets.page.list', function($view)
{
	$ids = [];
	$alias = [];
	if(App\Menu::getActiveMenuRootId())
	{
	  	$ids[] = App\Menu::getActiveMenuRoot()->id;
	}
	$menus = [];
	if (App\Menu::getActiveMenu())
	{
		$menus = App\Menu::getActiveMenu()->getDescendantsAndSelf();
	}

	foreach ($menus as $key => $val) 
	{
		$ids[] = $val->id;
		$alias[] = $val->url;
	}

	$page_list = App\Page::whereIn('menu_id',$ids)->where('list_in',true)->orderBy('sort','desc')->paginate(config('jetcms.web.paginate',10));
	$view->with('page_list', $page_list);
});