<?php namespace JetCMS\Website\Controllers;

use Cache;
use HTMLMin;
use Request;

use SEO;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Page;
use App\Menu;

class PageController extends Controller
{
    protected $defaultTplPage = 'tpl.main';
    protected $view_comments = true;
    protected $list = false;

    Protected $template = null;

    Public function pageModel($context,$alias)
    {
        if (is_array($alias)){
            $page = Page::where('context',$context)
                ->whereIn('alias', $alias)
                ->where('active', true)
                ->first();
        }else{
            $page = Page::where('context',$context)
                ->where('alias', $alias)
                ->where('active', true)
                ->first();
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
            $html = view($tpl, $value);
        }else{
            $html = view($this->defaultTplPage, $value);
        }

        if (Request::ajax()){
            if(preg_match('/(?:.)*<body[^>]?>(.*)<\/body[^>]?>(?:.)*/is',$html,$matches)){
                return $matches[1];
            }else{
                return 'error';
            }
        }else{
            return $html;
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

        SEO::setTitle($page->title);
        SEO::setDescription($page->description);
        if ($page->image) {
            SEO::addImages(asset($page->image));
        }
        $value['page'] = $page;

        if ($page->comments and $this->view_comments) {
            $page->load('comments', 'comments.user');
            $value['comments'] = $page->comments;
        }

        $value['view_comments'] = $this->view_comments;

        if ($page->menu) {
            $page->menu->setActiveThis();
            $menuLevel = $page->menu->getMapLevel(true);

            if($this->list) {
                $childs = $page->menu->getChildsId(true);
                $list = Page::active()
                    ->where('context', $this->list)
                    ->whereIn('menu_id', $childs)
                    ->sort()
                    ->with('user','fields','tag')
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
        return $view;
    }
}
