<?php

namespace App\Middlewares;

use Core\Base\Middleware;
use Core\Helpers\Redirect;

class IsAuthor extends Middleware{
    public function handle(){
        if(auth()->user()->role() !== "author"){
            return Redirect::to("/");
        }
    }
}