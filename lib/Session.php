<?php

/**
 * Created by PhpStorm.
 * User: MD Nur
 * Date: 1/24/2017
 * Time: 2:54 PM
 */
class Session{


    public static function init() {
        session_start();
    }

    public static function set($key,$value) {
        $_SESSION[$key] =$value;
    }


    public static function get ($key) {
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }  else {
            return FALSE;
        }
    }

    public static function checkSeesion() {
        self::init();
        if(self::get("login") ==FALSE){
            self:: destory();
            header("location:login.php");
        }
    }


    public static function checkLogin() {
        self::init();
        if(self::get("login") ==TRUE){
            header("location:index.php.php");
        }
    }

    public static function destory() {
        session_destroy();
        header("Location:login.php?action=logout");
    }

}