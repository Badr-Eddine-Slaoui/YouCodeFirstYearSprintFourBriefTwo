<?php

namespace App\Controllers;

use App\Services\CommentService;
use Core\Base\Controller;
use Core\Helpers\Redirect;
use Core\Helpers\Request;
use Core\Helpers\Session;

class CommentController extends Controller{

    public function store(){
        $request = new Request();

        $service = CommentService::getInstance();

        $status = $service->create($request->all());

        if($status){
            Session::flash("success","Comment added successfully");
            return Redirect::back();
        }

        Session::flash("error","Something went wrong, try again later");
        return Redirect::back();
    }

    public function update(){
        $request = new Request();

        $service = CommentService::getInstance();

        $status = $service->update($request->id, $request->all());

        if($status){
            Session::flash("success","Comment updated successfully");
            return Redirect::back();
        }

        Session::flash("error","Something went wrong, try again later");
        return Redirect::back();
    }

    public function destroy(){
        $request = new Request();

        $service = CommentService::getInstance();

        $status = $service->delete($request->id);

        if($status){
            Session::flash("success","Comment deleted successfully");
            return Redirect::back();
        }

        Session::flash("error","Something went wrong, try again later");
        return Redirect::back();
    }

}