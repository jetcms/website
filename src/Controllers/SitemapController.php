<?php namespace JetCMS\Website\Controllers;

use App;
use App\Page;
use App\Sitemap;
use App\Http\Controllers\Controller;


class SitemapController extends Controller {

    protected $default_freq = 'weekly';
    protected $default_priority = '0.50';

    Public function anyGenerate () {
        $sitemap = App::make("sitemap");
        $arr = $this->addLoc();

        $sitemapFix = Sitemap::get();
        if ($sitemapFix) {
            foreach ($sitemapFix as $sm) {
                $modified = (isset($arr[$sm->loc])) ? $arr[$sm->loc]['modified'] : $sm->lastmod;

                $arr[$sm->loc] = [
                    'priority' => $sm->priority,
                    'modified' => $modified,
                    'freq' => $sm->changefreq
                ];
            }
        }

        foreach($arr as $key=>$val){
            $sitemap->add(url($key),$val['modified'],$val['priority'],$val['freq']);
        }
        // generate your sitemap (format, filename)
        return $sitemap->render('xml');
    }

    Protected function addLoc($arr = []){
        $pages = $this->getModel();
        if ($pages) {
            foreach ($pages as $page) {
                $arr[$page->url] = [
                    'modified' => $page->updated_at->toDateTimeString(),
                    'priority' => $this->default_priority,
                    'freq' => $this->default_freq
                ];
            }
        }
        return $arr;
    }

    Protected function getModel(){
        Page::active()->with('user')->get();
    }
}

