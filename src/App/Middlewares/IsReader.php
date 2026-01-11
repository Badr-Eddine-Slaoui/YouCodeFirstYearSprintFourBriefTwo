<?php

namespace App\Middlewares;

use Core\Base\Middleware;
use Core\Helpers\Redirect;

class IsReader extends Middleware{
    public function handle(){
        if(auth()->user()->role() !== "author" && auth()->user()->role() !== "reader"){
            return Redirect::to("/");
        }
    }
}