<?php namespace JetCMS\Website\Controllers;

use App;
use Config;
use App\Page;
use App\Sitemap;
use App\Http\Controllers\Controller;


class SitemapController extends Controller {

    protected $default_freq = 'weekly';
    protected $default_priority = '0.50';

    Public function __construct(){
        $this->default_freq = Config::get('sitemap.freq',$this->default_freq);
        $this->default_priority = Config::get('sitemap.priority',$this->default_priority);
    }

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

                if (!$sm->in_sitemap){
                    unset($arr[$sm->loc]);
                }
            }
        }

        foreach($arr as $key=>$val){
            $sitemap->add(url($key),$val['modified'],$val['priority'],$val['freq']);
        }
        // generate your sitemap (format, filename)
        return $sitemap->render('xml');
    }

    Protected function addLoc($arr = []){
        $pages = $this->getData();
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

    Protected function getData(){
        return Page::active()->with('user')->get();
    }
}

