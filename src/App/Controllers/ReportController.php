<?php

namespace App\Controllers;

use App\Services\ReportService;
use Core\Base\Controller;
use Core\Helpers\Redirect;
use Core\Helpers\Request;
use Core\Helpers\Session;

class ReportController extends Controller{

    public function report_article(){
        $request = new Request();

        $service = ReportService::getInstance();

        if($service->reportArticle($request->article_id, session()->get('user_id'), $request->report_reason)){
            Session::flash("success","Article reported successfully");
            return Redirect::back();
        }

        Session::flash("error","Something went wrong, try again later");
        return Redirect::back();
    }

    public function unreport_article(){
        $request = new Request();

        $service = ReportService::getInstance();

        if($service->unreportArticle($request->article_id, session()->get('user_id'))){
            Session::flash("success","Article unreported successfully");
            return Redirect::back();
        }

        Session::flash("error","Something went wrong, try again later");
        return Redirect::back();
    }

    public function report_comment(){
        $request = new Request();

        $service = ReportService::getInstance();

        if($service->reportComment($request->comment_id, session()->get('user_id'), $request->report_reason)){
            Session::flash("success","Comment reported successfully");
            return Redirect::back();
        }

        Session::flash("error","Something went wrong, try again later");
        return Redirect::back();
    }

    public function unreport_comment(){
        $request = new Request();

        $service = ReportService::getInstance();

        if($service->unreportComment($request->comment_id, session()->get('user_id'))){
            Session::flash("success","Comment unreported successfully");
            return Redirect::back();
        }

        Session::flash("error","Something went wrong, try again later");
        return Redirect::back();
    }
}