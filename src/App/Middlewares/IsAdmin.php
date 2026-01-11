<?php

namespace App\Middlewares;

use Core\Base\Middleware;
use Core\Helpers\Redirect;

class IsAdmin extends Middleware{
    public function handle(){
        if(auth()->user()->role() !== "admin"){
            return Redirect::to("/");
        }
    }
}