<?php

namespace App\Middlewares;

use Core\Base\Middleware;
use Core\Helpers\Redirect;
use Core\Helpers\Session;
use DateTime;

class IsSuspended extends Middleware{
    public function handle(){
        if(auth()->user()->isSuspended()){
            $until = date_diff(auth()->user()->getSuspendUntil(), new DateTime());
            $for = $until->days > 0 ? 
            ( $until->days == 1 ? "{$until->days} day" : "{$until->days} days" ) 
            : ( $until->h > 0 ? ($until->h == 1 ? "{$until->h} hour" : "{$until->h} hours") 
            : ("{$until->m} minutes") );
            auth()->logout();
            Session::flash('error', "You are timeouted for {$for}");
            return Redirect::to('/login');
        }
    }
}