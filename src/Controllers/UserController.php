<?php namespace JetCMS\Website\Controllers;

use App;
use App\Page;
use App\Sitemap;
use App\Http\Controllers\Controller;


class UserController extends Controller {

    public function showLk(){
        return view('user.lk');
    }

    public function showProfile($id){
        return view('user.profile');
    }

    public function showHome(){
        return view('user.home');
    }
}

