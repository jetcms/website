<?php namespace JetCMS\Website\Controllers;

use App\Http\Controllers\Controller;
use App\Page;
use App\Menu;

class PageController extends Controller {

	public function index()
    {
    	$page = Page::whereIn('alias',['/',null,''])->first();
    	if ($page)
    	{
    		$page->setActivePage();
    		return $this->alias($page);
    	}
    	else
    	{
    		throw new NotFoundHttpException;
    	}
        
    }

    public function alias(Page $page)
    {

        $page->setActivePage();
    	//$page = Page::getActivePage();
    	if ($page->menu)
    	{
    		Menu::setActiveMenuObject($page->menu);
		}
        return view('tpl.page.'.$page->template,['page'=>$page->toArray()]);
    }

}