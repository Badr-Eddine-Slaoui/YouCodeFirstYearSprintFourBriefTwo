<?php

namespace App\Controllers;

use Core\Base\Controller;
use Core\Database\Database;
use Core\Helpers\Redirect;
use Core\Helpers\Request;
use Core\Helpers\Session;
use Core\Helpers\Validator;

class CommentController extends Controller{

    public function store(){
        $request = new Request();

        if(!Validator::comment($request->inputs())){
            return Redirect::back();
        }

        $db = Database::getInstance();

        $stmt = $db->prepare("INSERT INTO comments (article_id, reader_id, body) VALUES (:article_id, :reader_id, :body)");
        $status = $stmt->execute([
            "article_id" => $request->article_id,
            "reader_id" => session()->get("user_id"),
            "body" => $request->content
        ]);

        if($status){
            Session::flash("success","Comment added successfully");
            return Redirect::back();
        }

        Session::flash("error","Something went wrong, try again later");
        return Redirect::back();
    }

    public function update(){
        $request = new Request();

        if(!Validator::comment($request->inputs())){
            return Redirect::back();
        }

        $db = Database::getInstance();

        $stmt = $db->prepare("UPDATE comments SET body = :body WHERE id = :id");
        $status = $stmt->execute([
            "id" => $request->id,
            "body" => $request->content
        ]);

        if($status){
            Session::flash("success","Comment updated successfully");
            return Redirect::back();
        }

        Session::flash("error","Something went wrong, try again later");
        return Redirect::back();
    }

    public function destroy(){
        $request = new Request();

        $db = Database::getInstance();

        $stmt = $db->prepare("DELETE FROM comments WHERE id = :id");
        $status = $stmt->execute(["id" => $request->id]);

        if($status){
            Session::flash("success","Comment deleted successfully");
            return Redirect::back();
        }

        Session::flash("error","Something went wrong, try again later");
        return Redirect::back();
    }

}