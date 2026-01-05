<?php

namespace App\Controllers;

use App\DAOs\ArticleDAO;
use App\DAOs\CategoryDAO;
use App\Mappers\ArticleMapper;
use App\Mappers\CategoryMapper;
use App\Models\Article;
use App\Models\Category;
use App\Repositories\ArticleRepository;
use App\Services\ArticleService;
use App\Services\CategoryService;
use Core\Base\Controller;
use Core\Database\Database;
use Core\Helpers\Redirect;
use Core\Helpers\Request;
use Core\Helpers\Session;
use Core\Helpers\Validator;

class ArticleController extends Controller
{
    public function index()
    {
        $service = ArticleService::getInstance();

        $articles = $service->getAuthorArticles(
            session()->get('user_id')
        );

        if($articles){
            return $this->view('author.articles.index', compact('articles'), 'author');
        }

        Session::flash('error','Something went wrong, try again later');
        Redirect::back();
    }

    public function show(){
        $request = new Request();

        $service = ArticleService::getInstance();

        $article = $service->getArticle($request->id);

        if($article){
            return $this->view('author.articles.show', compact('article'), 'author');
        }

        Session::flash('error','Something went wrong, try again later');
        return Redirect::back();
    }

    public function create()
    {
        $service = CategoryService::getInstance();
        $categories = $service->getCategories();

        if($categories){
            return $this->view('author.articles.create', compact('categories'), 'author');
        }

        Session::flash('error','Something went wrong, try again later');
        return Redirect::back();
    }

    public function store()
    {
        $request = new Request();
        $service = ArticleService::getInstance();

        $status = $service->create($request->inputs(), $request->file('cover'), session()->get('user_id'));
        
        if($status){
            Session::flash("success","Article created successfully");
            return Redirect::to("/author/articles");
        }

        Session::flash("error","Something went wrong, try again later");
        return Redirect::back();
    }

    public function edit()
    {
        $request = new Request();

        $articleService = ArticleService::getInstance();
        $categoryService = CategoryService::getInstance();

        $article = $articleService->getArticle($request->id);
        $categories = $categoryService->getCategories();

        if($article && $categories){
            return $this->view('author.articles.edit', compact('article', 'categories'), 'author');
        }

        Session::flash('error','Something went wrong, try again later');
        return Redirect::back();
    }

    public function update()
    {
        $request = new Request();
        $service = ArticleService::getInstance();

        $status = $service->update($request->id, $request->inputs(), $request->file('cover'), session()->get('user_id'));
        
        if($status) {
            Session::flash("success","Article updated successfully");
            return Redirect::to("/author/articles");
        }

        Session::flash("error","Something went wrong, try again later");
        return Redirect::back();
    }

    public function destroy()
    {
        $request = new Request();
        $service = ArticleService::getInstance();

        $status = $service->delete($request->id);

        if($status){
            Session::flash("success","Article deleted successfully");
            return Redirect::to("/author/articles");
        }

        Session::flash("error","Something went wrong, try again later");
        return Redirect::back();
    }
}