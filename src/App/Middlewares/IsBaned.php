<?php

namespace App\Middlewares;

use Core\Base\Middleware;
use Core\Helpers\Redirect;
use Core\Helpers\Session;

class IsBaned extends Middleware{
    public function handle(){
        if(auth()->user()->isBanned()){
            auth()->logout();
            Session::flash('error', 'You are banned');
            return Redirect::to('/login');
        }
    }
}