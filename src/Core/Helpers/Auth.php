<?php

namespace Core\Helpers;

use App\Models\Admin;
use App\Models\Author;
use App\Models\Reader;
use App\Models\User;
use Core\Database\Database;
use DateTime;

class Auth{
    public static function login(string $email, string $password): bool{
        if(empty($email) || empty($password)){
            return false;
        }
        
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(["email" => $email]);
        $user = $stmt->fetch();

        if(empty($user)){
            Session::flash("error", "Invalid credentials");
            return false;
        }
        
        if(!password_verify($password, $user["password"])){
            Session::flash("error", "Invalid credentials");
            return false;
        }

        if($user["is_baned"]){
            Session::flash("error", "You are banned");
            return false;
        }

        if($user["is_blacklisted"]){
            Session::flash("error", "You are blacklisted");
            return false;
        }

        if($user["suspend_until"]){
            if(new DateTime($user["suspend_until"]) > new DateTime()){
                Session::flash("error", "You are suspended");
                return false;
            }
        }

        Session::set("user_id", $user["id"]);
        Session::regenerate();
        return true;

    }

    public static function register(array $data): bool{
        $db = Database::getInstance();

        $stmt = $db->prepare("INSERT INTO users (first_name, last_name, email, password, role) VALUES (:first_name, :last_name, :email, :password, :role)");
        
        $status = $stmt->execute([
            "first_name" => $data["first_name"],
            "last_name" => $data["last_name"],
            "email"=> $data["email"],
            "password" => password_hash($data["password"], PASSWORD_BCRYPT),
            "role" => $data["role"],
        ]);

        if($status){
            return true;
        }

        return false;
    }

    public static function logout(): bool{
        Session::destroy();
        Session::start();
        Session::regenerate();
        return true;
    }

    public static function check(): bool{
        if (!Session::has('user_id')) {
            return false;
        }

        $user_id = Session::get('user_id');

        $db = Database::getInstance();

        $stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(["id" => $user_id]);
        $user = $stmt->fetch();

        if($user){
            return true;
        }

        return false;
    }

    public static function user(): ?User{
        if (!static::check()) {
            return null;
        }

        $user_id = Session::get("user_id");

        $db = Database::getInstance();

        $stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(["id" => $user_id]);
        $user = $stmt->fetch();

        if($user){

            if($user["role"] === "admin"){
                $user = new Admin((int) $user["id"], $user["first_name"], $user["last_name"], $user["email"], $user["password"], $user["is_baned"], $user["is_blacklisted"], $user["suspend_until"], $user["timeouted_until"], $user["created_at"]);
            }else if($user["role"] === "author") {
                $user = new Author((int) $user["id"], $user["first_name"], $user["last_name"], $user["email"], $user["password"], $user["is_baned"], $user["is_blacklisted"], $user["suspend_until"], $user["timeouted_until"], $user["created_at"]);
            }else{
                $user = new Reader((int) $user["id"], $user["first_name"], $user["last_name"], $user["email"], $user["password"], $user["is_baned"], $user["is_blacklisted"], $user["suspend_until"], $user["timeouted_until"], $user["created_at"]);
            }

            return $user;
        }

        return null;
    }
}