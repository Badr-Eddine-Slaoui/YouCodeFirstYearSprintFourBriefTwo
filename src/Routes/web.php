<?php

$router->get("/", "HomeController@index")->name("home");
$router->get("/article", "HomeController@article")->name("article");
$router->get("/login","AuthController@login")->name("login")->middleware(["IsGuest"]);
$router->get("/register","AuthController@register")->name("register")->middleware(["IsGuest"]);

$router->post("/login","AuthController@submitLogin")->name("login.submit")->middleware(["IsGuest"]);
$router->post("/register","AuthController@submitRegister")->name("register.submit")->middleware(["IsGuest"]);
$router->post("/logout","AuthController@logout")->name("logout")->middleware(["IsAuthed"]);

$router->get("/author","AuthorController@index")->name("author.dashboard")->middleware(["IsAuthed", "IsAuthor", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);

$router->get("/author/articles","ArticleController@index")->name("author.articles.index")->middleware(["IsAuthed", "IsAuthor", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);
$router->get("/author/article","ArticleController@show")->name("author.articles.show")->middleware(["IsAuthed", "IsAuthor", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);
$router->get("/author/articles/create","ArticleController@create")->name("author.articles.create")->middleware(["IsAuthed", "IsAuthor", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);
$router->get("/author/articles/edit","ArticleController@edit")->name("author.articles.edit")->middleware(["IsAuthed", "IsAuthor", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);
$router->post("/author/articles/store","ArticleController@store")->name("author.articles.store")->middleware(["IsAuthed", "IsAuthor", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);
$router->post("/author/articles/update","ArticleController@update")->name("author.articles.update")->middleware(["IsAuthed", "IsAuthor", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);
$router->post("/author/articles/delete","ArticleController@destroy")->name("author.articles.destroy")->middleware(["IsAuthed", "IsAuthor", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);
$router->get("/author/comments","AuthorController@comments")->name("author.comments.index")->middleware(["IsAuthed", "IsAuthor", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);
$router->get("/author/likes","AuthorController@likes")->name("author.likes.index")->middleware(["IsAuthed", "IsAuthor", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);

$router->get("/admin","AdminController@index")->name("admin.dashboard")->middleware(["IsAuthed", "IsAdmin", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);

$router->get("/admin/categories/create","CategoryController@create")->name("admin.categories.create")->middleware(["IsAuthed", "IsAdmin", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);
$router->get("/admin/categories/edit","CategoryController@edit")->name("admin.categories.edit")->middleware(["IsAuthed", "IsAdmin", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);
$router->post("/admin/categories/store","CategoryController@store")->name("admin.categories.store")->middleware(["IsAuthed", "IsAdmin", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);
$router->post("/admin/categories/update","CategoryController@update")->name("admin.categories.update")->middleware(["IsAuthed", "IsAdmin", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);
$router->post("/admin/categories/delete","CategoryController@destroy")->name("admin.categories.destroy")->middleware(["IsAuthed", "IsAdmin", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);
$router->post("/admin/articles/delete","ArticleController@destroy")->name("admin.articles.destroy")->middleware(["IsAuthed", "IsAdmin", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);


$router->get("/admin/categories","AdminController@categories")->name("admin.categories.index")->middleware(["IsAuthed", "IsAdmin", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);
$router->get("/admin/users","AdminController@users")->name("admin.users.index")->middleware(["IsAuthed", "IsAdmin", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);
$router->get("/admin/articles","AdminController@articles")->name("admin.articles.index")->middleware(["IsAuthed", "IsAdmin", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);
$router->get("/admin/reports","AdminController@reports")->name("admin.reports.index")->middleware(["IsAuthed", "IsAdmin", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);
$router->get("/admin/comments","AdminController@comments")->name("admin.comments.index")->middleware(["IsAuthed", "IsAdmin", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);
$router->post("/admin/comments/destroy","CommentController@destroy")->name("admin.comments.destroy")->middleware(["IsAuthed", "IsAdmin", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);

$router->post("/admin/users/ban","AdminController@banUser")->name("admin.users.ban")->middleware(["IsAuthed", "IsAdmin", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);
$router->post("/admin/users/suspend","AdminController@suspendUser")->name("admin.users.suspend")->middleware(["IsAuthed", "IsAdmin", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);
$router->post("/admin/users/timeout","AdminController@timeoutUser")->name("admin.users.timeout")->middleware(["IsAuthed", "IsAdmin", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);
$router->post("/admin/users/blacklist","AdminController@blacklistUser")->name("admin.users.blacklist")->middleware(["IsAuthed", "IsAdmin", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);

$router->post("/admin/users/unban","AdminController@unbanUser")->name("admin.users.unban")->middleware(["IsAuthed", "IsAdmin", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);
$router->post("/admin/users/unsuspend","AdminController@unsuspendUser")->name("admin.users.unsuspend")->middleware(["IsAuthed", "IsAdmin", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);
$router->post("/admin/users/untimeout","AdminController@untimeoutUser")->name("admin.users.untimeout")->middleware(["IsAuthed", "IsAdmin", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);
$router->post("/admin/users/unblacklist","AdminController@unblacklistUser")->name("admin.users.unblacklist")->middleware(["IsAuthed", "IsAdmin", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);

$router->post("/reader/comments/store","CommentController@store")->name("reader.comments.store")->middleware(["IsAuthed", "IsReader", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);
$router->post("/reader/comments/update","CommentController@update")->name("reader.comments.update")->middleware(["IsAuthed", "IsReader", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);
$router->post("/reader/comments/destroy","CommentController@destroy")->name("reader.comments.destroy")->middleware(["IsAuthed", "IsReader", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);

$router->post("/reader/articles/like","LikeController@like_article")->name("reader.articles.like")->middleware(["IsAuthed", "IsReader", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);
$router->post("/reader/articles/unlike","LikeController@unlike_article")->name("reader.articles.unlike")->middleware(["IsAuthed", "IsReader", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);
$router->post("/reader/comments/like","LikeController@like_comment")->name("reader.comments.like")->middleware(["IsAuthed", "IsReader", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);
$router->post("/reader/comments/unlike","LikeController@unlike_comment")->name("reader.comments.unlike")->middleware(["IsAuthed", "IsReader", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);

$router->post("/report/article/store","ReportController@report_article")->name("report.article.store")->middleware(["IsAuthed", "IsReader", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);
$router->post("/report/comment/store","ReportController@report_comment")->name("report.comment.store")->middleware(["IsAuthed", "IsReader", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);

$router->post("/report/article/destroy","ReportController@unreport_article")->name("report.article.destroy")->middleware(["IsAuthed", "IsReader", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);
$router->post("/report/comment/destroy","ReportController@unreport_comment")->name("report.comment.destroy")->middleware(["IsAuthed", "IsReader", "IsBlacklisted", "IsBaned", "IsSuspended", "IsTimeouted"]);