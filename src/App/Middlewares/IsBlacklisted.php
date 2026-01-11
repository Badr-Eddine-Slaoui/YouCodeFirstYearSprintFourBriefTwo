<?php

namespace App\Middlewares;

use Core\Base\Middleware;
use Core\Helpers\Redirect;
use Core\Helpers\Session;

class IsBlacklisted extends Middleware{
    public function handle(){
        if(auth()->user()->isBlacklisted()){
            auth()->logout();
            Session::flash('error', 'You are blacklisted');
            return Redirect::to('/login');
        }
    }
}