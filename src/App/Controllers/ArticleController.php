<?php

namespace App\Controllers;

use App\Models\Article;
use App\Models\Category;
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
        $db = Database::getInstance();

        $stmt = $db->prepare("SELECT a.*, COUNT(l.id) as likes_count, COUNT(c.id) as comments_count FROM articles a LEFT JOIN likes l ON a.id = l.article_id LEFT JOIN comments c ON a.id = c.article_id WHERE a.author_id = :author_id GROUP BY a.id ORDER BY a.created_at DESC");
        $status = $stmt->execute(["author_id" => session()->get("user_id")]);
        if ($status) {
            $data = $stmt->fetchAll();
            $articles = [];

            foreach ($data as $article) {
                $stmt = $db->prepare("SELECT category_id, name FROM article_category a LEFT JOIN categories c ON a.category_id = c.id WHERE a.article_id = :article_id");
                $status = $stmt->execute(["article_id" => $article['id']]);
                if($status){
                    $categories_data = $stmt->fetchAll();
                    $article_categories = [];
                    foreach ($categories_data as $article_category) {
                        $article_categories[] = new Category($article_category['category_id'], $article_category['name'], "");
                    }
                    $articles[] = new Article($article['id'], $article['title'], $article['body'], $article['cover'], $article["author_id"], $article_categories, $article['created_at'], $article['likes_count'], $article['comments_count']);
                }
            }

            return $this->view('author.articles.index', compact('articles'), 'author');
        }

        Session::flash('error','Something went wrong, try again later');
        Redirect::back();
    }

    public function show(){
        $request = new Request();

        $db = Database::getInstance();

        $stmt = $db->prepare('SELECT a.*, COUNT(l.id) as likes_count, COUNT(c.id) as comments_count FROM articles a LEFT JOIN likes l ON a.id = l.article_id LEFT JOIN comments c ON a.id = c.article_id WHERE a.id = :article_id GROUP BY a.id ORDER BY a.created_at DESC');
        $status = $stmt->execute(["article_id" => $request->id]);

        if($status){
            $data = $stmt->fetch();

            $stmt = $db->prepare("SELECT category_id, name FROM article_category a LEFT JOIN categories c ON a.category_id = c.id WHERE a.article_id = :article_id");
            $status = $stmt->execute(["article_id"=> $request->id]);
            if($status){
                $categories = $stmt->fetchAll();
                $article_categories = [];
                foreach ($categories as $article_category) {
                    $article_categories[] = new Category($article_category['category_id'], $article_category['name'], "");
                }

                $article = new Article($data['id'], $data['title'], $data['body'], $data['cover'], $data["author_id"], $article_categories, $data['created_at'], $data['likes_count'], $data['comments_count']);

                return $this->view('author.articles.show', compact('article'), 'author');
            }
        }

        Session::flash('error','Something went wrong, try again later');
        Redirect::back();
    }

    public function create()
    {
        $db = Database::getInstance();
        $data = $db->query("SELECT * FROM categories")->fetchAll();
        $categories = [];
        foreach ($data as $row) {
            $categories[] = new Category($row['id'], $row['name'], $row['description']);
        }

        $this->view('author.articles.create', compact('categories'), 'author');
    }

    public function store()
    {
        $request = new Request();

        if(!Validator::article(array_merge($request->inputs(), ["cover" => $request->file('cover')]))) {
            Redirect::back();
        }
        
        $cover =  $request->file('cover');
        $cover_ex = explode('.', $cover['name']);
        $cover_name = "cover-".time().".". end($cover_ex);
        move_uploaded_file($cover['tmp_name'], __DIR__.'/../../public/images/'.$cover_name);

        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO articles (title, cover, body, author_id) VALUES (:title, :cover, :body, :author_id)");
        $status = $stmt->execute([
            "title" => $request->title,
            "cover" => "/images/$cover_name",
            "body" => $request->content,
            "author_id" => session()->get("user_id")
        ]);

        if($status){
            $article_id = $db->lastInsertId();
            foreach ($request->categories as $category_id) {
                $stmt = $db->prepare("INSERT INTO article_category (article_id, category_id) VALUES (:article_id, :category_id)");
                $status = $stmt->execute([
                    "article_id" => $article_id,
                    "category_id" => $category_id
                ]);
                if($status){
                    Session::flash("success","Article created successfully");
                    return Redirect::to("/author/articles");
                }
            }
        }

        Session::flash("error","Something went wrong, try again later");
        return Redirect::back();
    }

    public function edit()
    {
        $request = new Request();

        $db = Database::getInstance();

        $data = $db->query("SELECT * FROM categories")->fetchAll();
        $categories = [];
        foreach ($data as $row) {
            $categories[] = new Category($row['id'], $row['name'], $row['description']);
        }

        $stmt = $db->prepare("SELECT * FROM articles WHERE id = :id AND author_id = :author_id");
        $status = $stmt->execute(["id" => $request->id, "author_id" => session()->get("user_id")]);
        if($status){
            $data = $stmt->fetch();

            $stmt = $db->prepare("SELECT category_id, name FROM article_category a LEFT JOIN categories c ON a.category_id = c.id WHERE a.article_id = :article_id");
            $status = $stmt->execute(["article_id" => $request->id]);
            if($status){
                $categories_data = $stmt->fetchAll();
                $article_categories = [];
                foreach ($categories_data as $article_category) {
                    $article_categories[] = new Category($article_category['category_id'], $article_category['name'], "", 0);
                }
                $article = new Article($data['id'], $data['title'], $data['body'], $data['cover'], $data["author_id"], $article_categories, $data['created_at']);
                $this->view('author.articles.edit', compact('article', 'categories'), 'author');
                return;
            }
        }

        Session::flash('error','Something went wrong, try again later');
        return Redirect::back();
    }

    public function update()
    {
        $request = new Request();

        if(!Validator::article(array_merge($request->inputs(), ["cover" => $request->file('cover')]))) {
            Redirect::back();
        }
        
        $cover =  $request->file('cover');
        $cover_ex = explode('.', $cover['name']);
        $cover_name = "/images/cover-".time().".". end($cover_ex);
        
        $db = Database::getInstance();

        $stmt = $db->prepare('SELECT cover FROM articles WHERE id = :id AND author_id = :author_id');
        $status = $stmt->execute(["id" => $request->id, "author_id" => session()->get("user_id")]);
        if($status) {
            $old_cover = $stmt->fetchColumn();

            if($old_cover != "/images/$cover_name") {
                unlink(__DIR__ ."/../../public" . $old_cover);
                move_uploaded_file($cover['tmp_name'], __DIR__.'/../../public'.$cover_name);
            }else{
                $cover_name = $old_cover;
            }

            $stmt = $db->prepare('DELETE FROM article_category WHERE article_id = :article_id');
            $status = $stmt->execute(["article_id" => $request->id]);

            if($status) {
                foreach($request->categories as $category_id) {
                    $stmt = $db->prepare('INSERT INTO article_category (article_id, category_id) VALUES (:article_id, :category_id)');
                    $status = $stmt->execute(['article_id' => $request->id, 'category_id' => $category_id]);
                }

                $stmt = $db->prepare('UPDATE articles SET title = :title, body = :body, cover = :cover WHERE id = :id AND author_id = :author_id');
                $status = $stmt->execute([
                    "title" => $request->title,
                    "body" => $request->content,
                    "cover" => $cover_name,
                    "id" => $request->id,
                    "author_id" => session()->get("user_id"),
                ]);

                if($status) {
                    Session::flash("success","Article updated successfully");
                    return Redirect::to("/author/articles");
                }
            }
        }

        Session::flash("error","Something went wrong, try again later");
        return Redirect::back();
    }

    public function destroy()
    {
        $request = new Request();

        $db = Database::getInstance();

        $stmt = $db->prepare("SELECT cover FROM articles WHERE id = :id AND author_id = :author_id");
        $status = $stmt->execute(["id"=> $request->id, "author_id"=> session()->get("user_id")]);
        if($status) {
            $cover = $stmt->fetchColumn();
            unlink(__DIR__ ."/../../public" . $cover);

            $stmt = $db->prepare("DELETE FROM article_category WHERE article_id = :article_id");
            $status = $stmt->execute(["article_id"=> $request->id]);

            if($status) {
                $stmt = $db->prepare("DELETE FROM articles WHERE id = :id AND author_id = :author_id");
                $status = $stmt->execute(["id" => $request->id, "author_id" => session()->get("user_id")]);

                if($status){
                    Session::flash("success","Article deleted successfully");
                    return Redirect::to("/author/articles");
                }
            }
        }

        Session::flash("error","Something went wrong, try again later");
        return Redirect::back();
    }
}