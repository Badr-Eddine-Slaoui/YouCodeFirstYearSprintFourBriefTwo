<?php

namespace Core\Helpers;

use App\Enums\ReportReason;
use Core\Database\Database;

class Validator {
    public static function register(array $data) {
        $errors = [];
        $isValid = true;

        if(empty($data["first_name"])) {
            $errors["first_name"] = "First name is required";
            $isValid = false;
        }

        if(empty($data["last_name"])) {
            $errors["last_name"] = "Last name is required";
            $isValid = false;
        }

        if(empty($data["email"])) {
            $errors["email"] = "Email is required";
            $isValid = false;
        }else{
            if(!filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
                $errors["email"] = "Email is not valid";
                $isValid = false;
            }else{
                $db = Database::getInstance();
                $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
                $stmt->execute(["email" => $data["email"]]);
                $user = $stmt->fetch();
                if($user) {
                    $errors["email"] = "Email is already taken";
                    $isValid = false;
                }
            }
        }

        if(empty($data["password"])) {
            $errors["password"] = "Password is required";
            $isValid = false;
        }

        if(empty($data["password_confirmation"])) {
            $errors["password_confirmation"] = "Password confirmation is required";
            $isValid = false;
        }

        if($data["password"] !== $data["password_confirmation"]) {
            $errors["password_confirmation"] = "Password and password confirmation do not match";
            $isValid = false;
        }

        if(empty($data["role"])) {
            $errors["role"] = "Role is required";
            $isValid = false;
        }else{
            if(!in_array($data["role"], ["reader", "author"])) {
                $errors["role"] = "Role is not valid";
                $isValid = false;
            }
        }

        Session::flash("errors", $errors);
        return $isValid;
    }

    public static function login(array $data){
        $errors = [];
        $isValid = true;

        if(empty($data["email"])) {
            $errors["email"] = "Email is required";
            $isValid = false;
        }else{
            if(!filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
                $errors["email"] = "Email is not valid";
                $isValid = false;
            }
        }

        if(empty($data["password"])) {
            $errors["password"] = "";
            $isValid = false;
        }

        Session::flash("errors", $errors);
        return $isValid;
    }

    public static function category(array $data){
        $errors = [];
        $isValid = true;

        if(empty($data["name"])) {
            $errors["name"] = "Name is required";
            $isValid = false;
        }else{
            $db = Database::getInstance();
            $stmt = $db->prepare("SELECT * FROM categories WHERE name = :name");
            $stmt->execute(["name" => $data["name"]]);
            $category = $stmt->fetch();
            if($category) {
                $errors["name"] = "Category name is already taken";
                $isValid = false;
            }
        }

        Session::flash("errors", $errors);
        return $isValid;
    }

    public static function article(array $data){
        $errors = [];
        $isValid = true;

        if(empty($data["title"])) {
            $errors["title"] = "Title is required";
            $isValid = false;
        }

        if(empty($data["cover"]["name"])) {
            $errors["cover"] = "Cover is required";
            $isValid = false;
        }

        if(empty(trim(strip_tags($data["content"])))) {
            $errors["content"] = "Content is required";
            $isValid = false;
        }

        if(empty($data["categories"])) {
            $errors["categories"] = "Categories is required";
            $isValid = false;
        }

        Session::flash("errors", $errors);
        return $isValid;
    }

    public static function comment(array $data){
        $errors = [];
        $isValid = true;

        if(empty($data["content"])) {
            $errors["content"] = "Content is required";
            $isValid = false;
        }

        Session::flash("errors", $errors);
        return $isValid;
    }

    public static function report(array $data){
        $errors = [];
        $isValid = true;

        if(empty($data["message"])) {
            $errors["message"] = "Message is required";
            $isValid = false;
        }else{
            if(!ReportReason::tryFrom($data["message"])){
                $errors["message"] = "Message is not valid";
                $isValid = false;
            }
        }

        Session::flash("errors", $errors);
        return $isValid;
    }
}