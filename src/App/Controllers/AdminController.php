<?php

namespace App\Controllers;

use Core\Base\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return $this->view('admin.index', layout: 'admin');
    }
}