<?php namespace JetCMS\Website\Controllers;

use Input;
use Auth;
use App\Comment;
use App\Http\Controllers\Controller;

class CommentController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function postAdd(){

        $val = Input::all();

        $comment = new Comment();

        $comment->content = clean($val['comment'],'default');
        $comment->user_id = Auth::user()->id;
        if (isset($val['reply_id'])){
            $comment->reply_id = $val['reply_id'];
        }
        $comment->active = true;
        $comment->comment_id = $val['page_id'];
        $comment->comment_type = 'App\Page';
        $comment->save();

        if (Input::has('url')) {
            return redirect(Input::get('url').'#comment-'.$comment->id);
        }
        return redirect()->back();
    }

    public function postRemove($id){
        $comment = Comment::find($id);

        if ($comment->user_id == Auth::user()->id){
            $comment->delete();
        }
        return redirect()->back();
    }

}

