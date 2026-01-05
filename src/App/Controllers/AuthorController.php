<?php

namespace App\Controllers;

use Core\Base\Controller;

class AuthorController extends Controller
{
    public function index()
    {
        return $this->view('author.index', layout: 'author');
    }
}