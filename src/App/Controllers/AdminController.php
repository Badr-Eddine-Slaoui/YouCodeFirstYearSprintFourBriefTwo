<?php

namespace App\Controllers;

use App\Services\ArticleService;
use App\Services\CategoryService;
use App\Services\CommentService;
use App\Services\ReportService;
use Core\Base\Controller;
use Core\Helpers\Redirect;
use Core\Helpers\Session;

class AdminController extends Controller
{
    public function index()
    {
        return $this->view('admin.index', layout: 'admin');
    }

    public function articles()
    {
        $service = ArticleService::getInstance();

        $articles = $service->getArticles();

        if($articles){
            return $this->view('admin.articles.index', compact('articles'),'admin');
        }

        Session::flash('error','Something went wrong, try again later');
        return Redirect::back();
    }

    public function categories()
    {
        $service = CategoryService::getInstance();

        $categories = $service->getCategoriesWithArticleCount();
        $categories_count = count($categories);
        $unused_categories_count = $service->getUnusedCategoriesCount();
        $most_used_category_name = $service->getMostUsedCategoryName();

        if($categories && $most_used_category_name){
            return $this->view('admin.categories.index', compact('categories', 'categories_count', 'unused_categories_count', 'most_used_category_name'),'admin');
        }

        Session::set("error","Something went wrong, try again later");
        return Redirect::back();
    }

    public function comments()
    {
        $service = CommentService::getInstance();

        $comments = $service->getAll();

        if($comments){
            return $this->view('admin.comments.index', compact('comments'), 'admin');
        }

        Session::flash('error','Something went wrong, try again later');
        return Redirect::back();
    }

    public function users()
    {
        return $this->view('admin.users.index', layout: 'admin');
    }

    public function reports()
    {
        $service = ReportService::getInstance();

        $reports = $service->getAll();

        if(!is_null($reports)){
            return $this->view('admin.reports.index', compact('reports'), 'admin');
        }

        Session::flash('error','Something went wrong, try again later');
        return Redirect::back();
    }
}