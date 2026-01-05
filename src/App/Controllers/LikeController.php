<?php

namespace App\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Core\Base\Controller;
use Core\Database\Database;
use Core\Helpers\Redirect;
use Core\Helpers\Request;
use Core\Helpers\Session;

class LikeController extends Controller{

    public function like_article(){
        $request = new Request();

        if(Article::like($request->article_id)){
            Session::flash("success","Article liked successfully");
            return Redirect::back();
        }

        Session::flash("error","Something went wrong, try again later");
        return Redirect::back();
    }

    public function unlike_article(){
        $request = new Request();

        if(Article::unlike($request->article_id)){
            Session::flash("success","Article unliked successfully");
            return Redirect::back();
        }

        Session::flash("error","Something went wrong, try again later");
        return Redirect::back();
    }

    public function like_comment(){
        $request = new Request();

        if(Comment::like($request->comment_id)){
            Session::flash("success","Comment liked successfully");
            return Redirect::back();
        }

        Session::flash("error","Something went wrong, try again later");
        return Redirect::back();
    }

    public function unlike_comment(){
        $request = new Request();

        if(Comment::unlike($request->comment_id)){
            Session::flash("success","Comment unliked successfully");
            return Redirect::back();
        }

        Session::flash("error","Something went wrong, try again later");
        return Redirect::back();
    }
}