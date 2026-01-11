<?php

namespace App\Controllers;

use App\Enums\UserRole;
use Core\Base\Controller;
use Core\Helpers\Auth;
use Core\Helpers\Redirect;
use Core\Helpers\Request;
use Core\Helpers\Session;
use Core\Helpers\Validator;

class AuthController extends Controller
{
    public function login()
    {
        $this->view('auth.login');
    }

    public function register()
    {
        $this->view('auth.register');
    }

    public function submitLogin()
    {
        $request = new Request();

        if(!Validator::login($request->inputs())){
            return Redirect::back();
        }

        if(!Auth::login($request->email, $request->password)){
            return Redirect::back();
        }else{
            $user = Auth::user();
            Session::flash('success','Welcome ' . $user->getFullName());
            return match ($user->role()) {
                UserRole::ADMIN->value => Redirect::to('/admin'),
                UserRole::AUTHOR->value => Redirect::to('/author'),
                UserRole::READER->value => Redirect::to('/'),
                default => Redirect::to('/'),
            };
        }
    }

    public function submitRegister()
    {
        $request = new Request();

        if(!Validator::register($request->inputs())){
            return Redirect::back();
        }

        if(!Auth::register($request->inputs())){
            Session::flash('error','Something went wrong, try again later');
            return Redirect::back();
        }else{
            Session::flash('success','Registration successful');
            return Redirect::to('/login');
        }
    }

    public function logout()
    {
        if(Auth::logout()){
            Session::flash('success','You have been logged out');
            return Redirect::to('/login');
        }

        Session::flash('error','Something went wrong, try again later');
        return Redirect::back();
    }
}