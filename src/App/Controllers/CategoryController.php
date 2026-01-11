<?php

namespace App\Controllers;

use App\Services\CategoryService;
use Core\Base\Controller;
use Core\Helpers\Redirect;
use Core\Helpers\Request;
use Core\Helpers\Session;

class CategoryController extends Controller
{
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

        if(!is_null($category)){
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