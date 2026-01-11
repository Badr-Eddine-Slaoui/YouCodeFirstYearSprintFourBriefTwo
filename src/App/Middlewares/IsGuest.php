<?php

namespace App\Middlewares;

use Core\Base\Middleware;
use Core\Helpers\Redirect;

class IsGuest extends Middleware{
    public function handle()
    {
        if(auth()->check()){
            return Redirect::to("/");
        }
    }
}