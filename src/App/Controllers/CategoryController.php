<?php

namespace App\Controllers;

use App\Models\Category;
use App\Services\CategoryService;
use Core\Base\Controller;
use Core\Database\Database;
use Core\Helpers\Redirect;
use Core\Helpers\Request;
use Core\Helpers\Session;
use Core\Helpers\Validator;

class CategoryController extends Controller
{
    public function index()
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

    public function create()
    {
        return $this->view('admin.categories.create', layout: 'admin');
    }

    public function store()
    {
        $request = new Request() ;

        $service = CategoryService::getInstance();

        $status = $service->create($request->inputs());
        
        if($status){
            Session::flash("success","Category created successfully");
            return Redirect::to("/admin/categories");
        }

        Session::flash("error","Something went wrong, try again later");
        return Redirect::back();
    }

    public function edit()
    {
        $request = new Request();

        $service = CategoryService::getInstance();

        $category = $service->getCategory($request->id);

        if($category){
            return $this->view('admin.categories.edit', compact('category'), layout: 'admin');
        }

        Session::flash('error','Something went wrong, try again later');
        return Redirect::back();
    }

    public function update()
    {
        $request = new Request();

        $service = CategoryService::getInstance();

        $status = $service->update($request->id, $request->inputs());

        if($status){
            Session::flash("success","Category updated successfully");
            return Redirect::to("/admin/categories");
        }

        Session::flash("error","Something went wrong, try again later");
        return Redirect::back();
    }

    public function destroy()
    {
        $request = new Request();

        $service = CategoryService::getInstance();

        $status = $service->delete($request->id);

        if($status){
            Session::flash("success","Category deleted successfully");
            return Redirect::to("/admin/categories");
        }

        Session::flash("error","Something went wrong, try again later");
        return Redirect::back();
    }
}