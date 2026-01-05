<?php

$router->get("/", "HomeController@index")->name("home");
$router->get("/article", "HomeController@article")->name("article");
$router->get("/login","AuthController@login")->name("login");
$router->get("/register","AuthController@register")->name("register");

$router->post("/login","AuthController@submitLogin")->name("login.submit");
$router->post("/register","AuthController@submitRegister")->name("register.submit");
$router->post("/logout","AuthController@logout")->name("logout");

$router->get("/author","AuthorController@index")->name("author.dashboard");

$router->get("/author/articles","ArticleController@index")->name("author.articles.index");
$router->get("/author/article","ArticleController@show")->name("author.articles.show");
$router->get("/author/articles/create","ArticleController@create")->name("author.articles.create");
$router->get("/author/articles/edit","ArticleController@edit")->name("author.articles.edit");
$router->post("/author/articles/store","ArticleController@store")->name("author.articles.store");
$router->post("/author/articles/update","ArticleController@update")->name("author.articles.update");
$router->post("/author/articles/delete","ArticleController@destroy")->name("author.articles.destroy");

$router->get("/admin","AdminController@index")->name("admin.dashboard");

$router->get("/admin/categories","CategoryController@index")->name("admin.categories.index");
$router->get("/admin/categories/create","CategoryController@create")->name("admin.categories.create");
$router->get("/admin/categories/edit","CategoryController@edit")->name("admin.categories.edit");
$router->post("/admin/categories/store","CategoryController@store")->name("admin.categories.store");
$router->post("/admin/categories/update","CategoryController@update")->name("admin.categories.update");
$router->post("/admin/categories/delete","CategoryController@destroy")->name("admin.categories.destroy");

$router->post("/reader/comments/store","CommentController@store")->name("reader.comments.store");
$router->post("/reader/comments/update","CommentController@update")->name("reader.comments.update");
$router->post("/reader/comments/destroy","CommentController@destroy")->name("reader.comments.destroy");

$router->post("/reader/articles/like","LikeController@like_article")->name("reader.articles.like");
$router->post("/reader/articles/unlike","LikeController@unlike_article")->name("reader.articles.unlike");
$router->post("/reader/comments/like","LikeController@like_comment")->name("reader.comments.like");
$router->post("/reader/comments/unlike","LikeController@unlike_comment")->name("reader.comments.unlike");