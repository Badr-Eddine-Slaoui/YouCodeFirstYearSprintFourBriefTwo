<?php

namespace App\Controllers;

use App\Models\Article;
use App\Models\Category;
use Core\Base\Controller;
use Core\Database\Database;
use Core\Helpers\Redirect;
use Core\Helpers\Request;
use Core\Helpers\Session;

class HomeController extends Controller
{
    public function index()
    {
        $db = Database::getInstance();

        $stmt = $db->prepare("SELECT 
                                        a.*,
                                        COUNT(DISTINCT l.id) AS likes_count,
                                        COUNT(DISTINCT c.id) AS comments_count
                                    FROM articles a
                                    LEFT JOIN likes l 
                                        ON l.article_id = a.id
                                    LEFT JOIN comments c 
                                        ON c.article_id = a.id
                                    GROUP BY a.id
                                    ORDER BY a.created_at DESC;
                                    ");
        $status = $stmt->execute();
        if ($status) {
            $data = $stmt->fetchAll();
            $articles = [];

            foreach ($data as $article) {
                $stmt = $db->prepare("SELECT category_id, name FROM article_category a LEFT JOIN categories c ON a.category_id = c.id WHERE a.article_id = :article_id");
                $status = $stmt->execute(["article_id" => $article['id']]);
                if ($status) {
                    $categories_data = $stmt->fetchAll();
                    $article_categories = [];
                    foreach ($categories_data as $article_category) {
                        $article_categories[] = new Category($article_category['category_id'], $article_category['name'], "");
                    }
                    $articles[] = new Article($article['id'], $article['title'], $article['body'], $article['cover'], $article['author_id'], $article_categories, $article['created_at'], $article['likes_count'], $article['comments_count']);
                }
            }

            return $this->view('index', compact('articles'));
        }

        Session::flash('error', 'Something went wrong, try again later');
        Redirect::back();
    }

    public function article()
    {
        $request = new Request();

        $db = Database::getInstance();

        $stmt = $db->prepare('SELECT 
                                        a.*,
                                        COUNT(DISTINCT l.id) AS likes_count,
                                        COUNT(DISTINCT c.id) AS comments_count
                                    FROM articles a
                                    LEFT JOIN likes l 
                                        ON l.article_id = a.id
                                    LEFT JOIN comments c 
                                        ON c.article_id = a.id
                                    WHERE a.id = :article_id
                                    GROUP BY a.id;');
        $status = $stmt->execute(["article_id" => $request->id]);

        if ($status) {
            $data = $stmt->fetch();

            $stmt = $db->prepare("SELECT category_id, name FROM article_category a LEFT JOIN categories c ON a.category_id = c.id WHERE a.article_id = :article_id");
            $status = $stmt->execute(["article_id" => $request->id]);
            if ($status) {
                $categories = $stmt->fetchAll();
                $article_categories = [];
                foreach ($categories as $article_category) {
                    $article_categories[] = new Category($article_category['category_id'], $article_category['name'], "");
                }

                $article = new Article($data['id'], $data['title'], $data['body'], $data['cover'], $data["author_id"], $article_categories, $data['created_at'], $data['likes_count'], $data['comments_count']);

                return $this->view('article', compact('article'));
            }
        }

        Session::flash('error', 'Something went wrong, try again later');
        Redirect::back();
    }
}