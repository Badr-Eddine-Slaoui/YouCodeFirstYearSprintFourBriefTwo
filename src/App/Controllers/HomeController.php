<?php

namespace App\Controllers;

use App\Services\ArticleService;
use Core\Base\Controller;
use Core\Helpers\Redirect;
use Core\Helpers\Request;
use Core\Helpers\Session;

class HomeController extends Controller
{
    public function index()
    {
        $service = ArticleService::getInstance();

        $articles = $service->getArticles();
        
        if (!is_null($articles)) {
            return $this->view('index', compact('articles'));
        }

        Session::flash('error', 'Something went wrong, try again later');
        return Redirect::back();
    }

    public function article()
    {
        $request = new Request();

        $service = ArticleService::getInstance();

        $article = $service->getArticleWithRelations($request->id);

        if (!is_null($article)) {
            return $this->view('article', compact('article'));
        }

        Session::flash('error', 'Something went wrong, try again later');
        return Redirect::back();
    }
}