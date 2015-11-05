<?php namespace JetCMS\Website\Controllers;

use Cache;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Page;
use App\Menu;

class PageController extends Controller
{
    Public $defaultTplPage = 'tpl.main';

    Public function pageModel($context,$alias)
    {
        if (is_array($alias)){
            $page = Page::where('context',$context)->whereIn('alias', $alias)->first();
        }else{
            $page = Page::where('context',$context)->where('alias', $alias)->first();
        }

        if (!$page) {
            throw new NotFoundHttpException;
        }

        return $page;


        return view($page,$value);
    }

    Public function view($tpl,$value = [])
    {
        if (view()->exists($tpl))
        {
            return view($tpl, $value);
        }else{
            return view($this->defaultTplPage, $value);
        }
    }


    /*
    protected function view ($page,$value)
    {
        if (!$page)
        {
            return $this->notFoundPage();
        }

        if (view()->exists('tpl.' . $page->template))
        {
            return view('tpl.' . $page->template, $value);
        }
        return view('tpl.main', $value);
    }
*/

}