<?php

namespace App\Controllers;

use Core\Base\Controller;

class AuthorController extends Controller
{
    public function index()
    {
        $this->view('author.index', layout: 'author');
    }
}