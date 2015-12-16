<?php namespace JetCMS\Website\Controllers;

use App;
use App\User;
use App\Page;
use App\Sitemap;
use App\Http\Controllers\Controller;


class UserController extends Controller {

    public function showLk(){
        return view('user.lk');
    }

    public function showProfile($id){
        $user = User::find($id);
        return view('user.profile',compact('user'));
    }

    public function showHome(){
        return view('user.home');
    }
}

