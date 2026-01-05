<?php

namespace App\Controllers;

use App\Models\Category;
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
        $db = Database::getInstance();
        $data = $db->query("SELECT c.*, COUNT(a.id) as article_count FROM categories c LEFT JOIN article_category a ON c.id = a.category_id GROUP BY c.id ORDER BY c.id DESC")->fetchAll();
        $categories = [];
        foreach ($data as $row) {
            $categories[] = new Category($row['id'], $row['name'], $row['description'], $row['article_count']);
        }

        $categories_count = count($categories);

        $unused_categories_count = $db->query('SELECT COUNT(id) FROM categories WHERE id NOT IN (SELECT category_id FROM article_category)')->fetchColumn();

        $most_used_category_name = $db->query('SELECT c.name, COUNT(a.id) as article_count FROM categories c LEFT JOIN article_category a ON c.id = a.category_id GROUP BY c.id ORDER BY article_count DESC LIMIT 1')->fetchColumn();

        $this->view('admin.categories.index', compact('categories', 'categories_count', 'unused_categories_count', 'most_used_category_name'),'admin');
    }

    public function create()
    {
        $this->view('admin.categories.create', layout: 'admin');
    }

    public function store()
    {
        $request = new Request() ;

        if(!Validator::category($request->inputs())){
            return Redirect::back();
        }

        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO categories (name, description) VALUES (:name, :description)");
        $status = $stmt->execute(["name" => $request->name, "description"=> $request->description]);
        
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

        $db = Database::getInstance();

        $stmt = $db->prepare("SELECT * FROM categories WHERE id = :id");
        $status = $stmt->execute(["id" => $request->id]);
        if($status){
            $data = $stmt->fetch();
            $category = new Category($data['id'], $data['name'], $data['description']);
            $this->view('admin.categories.edit', compact('category'), layout: 'admin');
        }

        Session::flash('error','Something went wrong, try again later');
        return Redirect::back();
    }

    public function update()
    {
        $request = new Request();

        if(!Validator::category($request->inputs())){
            return Redirect::back();
        }

        $db = Database::getInstance();
        $stmt = $db->prepare("UPDATE categories SET name = :name, description = :description WHERE id = :id");
        $status = $stmt->execute(["name" => $request->name, "description" => $request->description, "id" => $request->id]);

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

        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM categories WHERE id = :id");
        $status = $stmt->execute(["id" => $request->id]);

        if($status){
            Session::flash("success","Category deleted successfully");
            return Redirect::to("/admin/categories");
        }

        Session::flash("error","Something went wrong, try again later");
        return Redirect::back();
    }
}