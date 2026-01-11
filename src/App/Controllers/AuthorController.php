<?php

namespace App\Controllers;

use App\Services\ArticleService;
use App\Services\AuthorService;
use App\Services\CommentService;
use App\Services\LikeService;
use Core\Base\Controller;
use Core\Helpers\Redirect;
use Core\Helpers\Session;

class AuthorController extends Controller
{
    public function index()
    {
        $articleServise = ArticleService::getInstance();
        $commentServise = CommentService::getInstance();
        $likeServise = LikeService::getInstance();
        $authorServise = AuthorService::getInstance();

        $id = session()->get("user_id");

        $totalLikes = $likeServise->getAuthorLikesCount($id);
        $totalComments = $commentServise->getAuthorCommentsCount($id);
        $totalArticles = $articleServise->getAuthorArticlesCount($id);

        $topPerformerArticle = $articleServise->getAuthorMostInteractedArticle($id);
        $topCommentedArticle = $articleServise->getAuthorMostCommentedArticle($id);
        $dailyAvgLikes = $likeServise->getAuthorDailyAvgLikesCount($id);
        $dailyAvgComments = $commentServise->getAuthorDailyCommentsCount($id);

        $interactions = $authorServise->getInteractions($id);

        if(!is_null($totalLikes) && !is_null($totalComments) && !is_null($totalArticles)  && !is_null($dailyAvgLikes) && !is_null($dailyAvgComments) && !is_null($interactions)){
            return $this->view('author.index', compact('totalLikes', 'totalComments', 'totalArticles', 'topPerformerArticle', 'topCommentedArticle', 'dailyAvgLikes', 'dailyAvgComments', 'interactions'), 'author');
        }

        Session::flash("error","Something went wrong, try again later");
        return Redirect::back();
    }

    public function comments(){
        $service = CommentService::getInstance();
        $comments = $service->getByAuthor(session()->get('user_id'));

        if(!is_null($comments)){
            return $this->view('author.comments.index', compact('comments'), 'author');
        }
        
        Session::flash("error","Something went wrong, try again later");
        return Redirect::back();
    }

    public function likes(){
        $service = LikeService::getInstance();
        $likes = $service->getByAuthor(session()->get('user_id'));

        if(!is_null($likes)){
            return $this->view('author.likes.index', compact('likes'), 'author');
        }
        
        Session::flash("error","Something went wrong, try again later");
        return Redirect::back();
    }
}