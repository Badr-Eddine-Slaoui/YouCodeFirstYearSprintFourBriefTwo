<?php

namespace Core\Helpers;

class Redirect {
    public static function to($url) {
        header('Location: ' . $url);
        exit;
    }

    public static function redirect($url) {
        self::to($url);
    }

    public static function back (){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}