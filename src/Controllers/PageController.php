<?php namespace JetCMS\Website\Controllers;

use Cache;
use HTMLMin;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Page;
use App\Menu;

class PageController extends Controller
{
    Public $defaultTplPage = 'tpl.main';
    protected $template = null;

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

    public function __call($method, $parameters)
    {
        if (str_is('show*', $method)){
            $alias = mb_strtolower(substr($method,4));
            return $this->pageCreateView($this->context,$alias);
        }
        throw new BadMethodCallException("Method [$method] does not exist.");
    }


    Public function pageCreateView($context,$alias,$value = []){

        $menuLevel = [];
        $page = $this->pageModel($context,$alias);

        $value['page'] = $page;

        if ($page->comments) {
            $value['comments'] = $page->comments;
        }

        if ($page->menu) {
            $page->menu->setActiveThis();
            $menuLevel = $page->menu->getMapLevel(true);

            if($this->list) {
                $childs = $page->menu->getChildsId(true);
                $list = Page::active()
                    ->where('context', $this->list)
                    ->whereIn('menu_id', $childs)
                    ->with('user','fields')
                    ->paginate(15);
                $value['list'] = $list;
            }
        }

        foreach ($menuLevel as $key=>$val){
            $value['menu_level_'.$key] = $val;
        }

        if($this->template) {
            $view = $this->view($this->template, $value);
        }else{
            $view = $this->view('tpl.'.$page->template, $value);
        }

        return html_minify($view);

        return preg_replace('/\r\n|\r|\n/u', '', $view);
    }
}
