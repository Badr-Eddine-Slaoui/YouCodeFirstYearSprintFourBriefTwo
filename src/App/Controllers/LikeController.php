<?php

namespace App\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Like;
use App\Services\LikeService;
use Core\Base\Controller;
use Core\Database\Database;
use Core\Helpers\Redirect;
use Core\Helpers\Request;
use Core\Helpers\Session;

class LikeController extends Controller{

    public function like_article(){
        $request = new Request();

        $service = LikeService::getInstance();

        if($service->likeArticle($request->article_id, session()->get('user_id'))){
            Session::flash("success","Article liked successfully");
            return Redirect::back();
        }

        Session::flash("error","Something went wrong, try again later");
        return Redirect::back();
    }

    public function unlike_article(){
        $request = new Request();

        $service = LikeService::getInstance();

        if($service->unlikeArticle($request->article_id, session()->get('user_id'))){
            Session::flash("success","Article unliked successfully");
            return Redirect::back();
        }

        Session::flash("error","Something went wrong, try again later");
        return Redirect::back();
    }

    public function like_comment(){
        $request = new Request();

        $service = LikeService::getInstance();

        if($service->likeComment($request->comment_id, session()->get('user_id'))){
            Session::flash("success","Comment liked successfully");
            return Redirect::back();
        }

        Session::flash("error","Something went wrong, try again later");
        return Redirect::back();
    }

    public function unlike_comment(){
        $request = new Request();

        $service = LikeService::getInstance();

        if($service->unlikeComment($request->comment_id, session()->get('user_id'))){
            Session::flash("success","Comment unliked successfully");
            return Redirect::back();
        }

        Session::flash("error","Something went wrong, try again later");
        return Redirect::back();
    }
}