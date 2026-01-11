<?php

namespace App\Controllers;

use App\Services\AdminService;
use App\Services\ArticleService;
use App\Services\CategoryService;
use App\Services\CommentService;
use App\Services\ReportService;
use Core\Base\Controller;
use Core\Helpers\Redirect;
use Core\Helpers\Request;
use Core\Helpers\Session;

class AdminController extends Controller
{
    public function index()
    {
        $admin = AdminService::getInstance();
        $articleService = ArticleService::getInstance();
        $commentService = CommentService::getInstance();
        $reportService = ReportService::getInstance();

        $activities = $admin->getRecentActivities();
        $articles = $articleService->getRecentArticles();
        $users_count = $admin->getUsersCount();
        $articles_count = $articleService->getArticlesCount();
        $comments_count = $commentService->getCommentsCount();
        $pending_reports_count = $reportService->pendingCount();

        if(!is_null($articles) && !is_null($users_count) && !is_null($articles_count) && !is_null($comments_count) && !is_null($pending_reports_count) && !is_null($activities)){
            return $this->view('admin.index', compact('articles', 'users_count', 'articles_count', 'comments_count', 'pending_reports_count', 'activities'), 'admin');
        }
        
        Session::flash('error','Something went wrong, try again later');
        return Redirect::back();
    }

    public function articles()
    {
        $service = ArticleService::getInstance();

        $articles = $service->getArticles();

        if(!is_null($articles)){
            return $this->view('admin.articles.index', compact('articles'),'admin');
        }

        Session::flash('error','Something went wrong, try again later');
        return Redirect::back();
    }

    public function categories()
    {
        $service = CategoryService::getInstance();

        $categories = $service->getCategoriesWithArticleCount();
        $categories_count = $categories ? count($categories) : 0;
        $unused_categories_count = $service->getUnusedCategoriesCount();
        $most_used_category_name = $service->getMostUsedCategoryName();

        if(!is_null($categories) && !is_null($categories_count) && !is_null($unused_categories_count)){
            return $this->view('admin.categories.index', compact('categories', 'categories_count', 'unused_categories_count', 'most_used_category_name'),'admin');
        }

        Session::set("error","Something went wrong, try again later");
        return Redirect::back();
    }

    public function comments()
    {
        $service = CommentService::getInstance();

        $comments = $service->getAll();

        if(!is_null($comments)){
            return $this->view('admin.comments.index', compact('comments'), 'admin');
        }

        Session::flash('error','Something went wrong, try again later');
        return Redirect::back();
    }

    public function users()
    {
        $service = AdminService::getInstance();

        $users = $service->getAll();

        if(!is_null($users)){
            return $this->view('admin.users.index', compact('users'), 'admin');
        }

        Session::flash('error','Something went wrong, try again later');
        return Redirect::back();
    }

    public function reports()
    {
        $service = ReportService::getInstance();

        $reports = $service->getAll();
        $pending_reports_count = $service->pendingCount();
        $resolved_reports_count = $service->resolvedCount();

        if(!is_null($reports) && !is_null($pending_reports_count) && !is_null($resolved_reports_count)){
            $reports_count = count($reports);
            
            return $this->view('admin.reports.index', compact('reports', 'reports_count', 'pending_reports_count', 'resolved_reports_count'), 'admin');
        }

        Session::flash('error','Something went wrong, try again later');
        return Redirect::back();
    }

    public function banUser(){
        $request = new Request();

        $adminService = AdminService::getInstance();
        
        if($adminService->banUser($request->id, $request->report_id)){
            Session::flash('success','User banned successfully');
            return Redirect::back();
        }

        Session::flash('error','Something went wrong, try again later');
        return Redirect::back();
    }

    public function blacklistUser(){
        $request = new Request();

        $adminService = AdminService::getInstance();
        
        if($adminService->blacklistUser($request->id, $request->report_id)){
            Session::flash('success','User blacklisted successfully');
            return Redirect::back();
        }

        Session::flash('error','Something went wrong, try again later');
        return Redirect::back();
    }

    public function timeoutUser(){
        $request = new Request();

        $adminService = AdminService::getInstance();

        if($adminService->timeoutUser($request->id, $request->report_id, $request->timeout_duration)){
            Session::flash('success','User timed out successfully');
            return Redirect::back();
        }

        Session::flash('error','Something went wrong, try again later');
    }

    public function suspendUser(){
        $request = new Request();

        $adminService = AdminService::getInstance();

        if($adminService->suspendUser($request->id, $request->report_id, $request->suspend_duration)){
            Session::flash('success','User suspended successfully');
            return Redirect::back();
        }

        Session::flash('error','Something went wrong, try again later');
        return Redirect::back();
    }

    public function unbanUser(){
        $request = new Request();

        $adminService = AdminService::getInstance();
        
        if($adminService->unbanUser($request->id)){
            Session::flash('success','User unbanned successfully');
            return Redirect::back();
        }

        Session::flash('error','Something went wrong, try again later');
        return Redirect::back();
    }

    public function unblacklistUser(){
        $request = new Request();

        $adminService = AdminService::getInstance();
        
        if($adminService->unblacklistUser($request->id)){
            Session::flash('success','User removed from blacklist successfully');
            return Redirect::back();
        }

        Session::flash('error','Something went wrong, try again later');
        return Redirect::back();
    }

    public function untimeoutUser(){
        $request = new Request();

        $adminService = AdminService::getInstance();

        if($adminService->untimeoutUser($request->id)){
            Session::flash('success','Timeout removed successfully');
            return Redirect::back();
        }

        Session::flash('error','Something went wrong, try again later');
    }

    public function unsuspendUser(){
        $request = new Request();

        $adminService = AdminService::getInstance();

        if($adminService->unsuspendUser($request->id)){
            Session::flash('success','User unsuspended successfully');
            return Redirect::back();
        }

        Session::flash('error','Something went wrong, try again later');
        return Redirect::back();
    }
}