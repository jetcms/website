<?php namespace JetCMS\Website\Controllers;

use App;
use App\Page;
use URL;
use Feed;
use App\Http\Controllers\Controller;


class FeedController extends Controller {

    protected $default_author = 'Администратор';
    protected $title = 'Название сайта';
    protected $description = 'Описание';
    protected $logo = '/logo.png';
    protected $local = 'ru';

    Public function anyGenerate () {
        $feed = Feed::make();

        // cache the feed for 60 minutes (second parameter is optional)
        //$feed->setCache(60, 'laravelFeedKey');

        // check if there is cached feed and build new only if is not
        if (!$feed->isCached())
        {
            // creating rss feed with our most recent 20 posts


            // set your feed's title, description, link, pubdate and language
            $feed->title = $this->title;
            $feed->description = $this->description;
            $feed->logo = $this->logo;
            $feed->link = URL::to('feed');
            $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'

            $feed->lang = $this->local;
            $feed->setShortening(true); // true or false
            $feed->setTextLimit(100); // maximum length of description text

            $feed = $this->addItem($feed);

        }

        // first param is the feed format
        // optional: second param is cache duration (value of 0 turns off caching)
        // optional: you can set custom cache key with 3rd param as string
        return $feed->render('atom');
    }

    Protected function addItem($feed){
        $pages = Page::active()->get();

        if ($pages) {
            foreach ($pages as $key=>$page)
            {
                if ($key == 0) {
                    $feed->pubdate = $page->created_at->toDateTimeString();
                }
                // set item's title, author, url, pubdate, description and content

                //$author =  ;
                $feed->add(
                    $page->title,
                    ($page->user) ? $page->user->name : $this->default_author,
                    URL::to($page->url),
                    $page->publish,
                    $page->description,
                    $page->content
                );
            }
        }
        return $feed;
    }
}

