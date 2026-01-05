<?php

namespace App\Controllers;

use Core\Base\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $this->view('admin.index', layout: 'admin');
    }
}