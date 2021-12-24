<?php

include "traits/middleware.trait.php";
include "traits/route.trait.php";

class Route {
    static $stop = false;
    static $urlWeb = NULL;
    use MiddlewareTrait;
    use RouteTrait;

    static public function get($url, $action, $middleware = ""){
        if(!self::$stop){
            self::checkUrl($url, $action, "GET", $middleware);
        }
    }
    static public function post($url, $action, $middleware = ""){
        if(!self::$stop) {
            self::checkUrl($url, $action, "POST", $middleware);
        }
    }
    static public function getBrowserUrl(){
        $urlWeb = $_SERVER["REQUEST_URI"];
        $urlWeb = substr($urlWeb,1);
        if( strlen($urlWeb) && $urlWeb[strlen($urlWeb) - 1] == '/'){
            $urlWeb = substr($urlWeb,0,strlen($urlWeb) - 1);
        }
        $isset = strpos($urlWeb, "?");
        if($isset != null){
            $urlWeb = substr($urlWeb, 0, $isset);
        }
        return $urlWeb;
    }

    static public function checkUrl($url, $action, $method, $middleware){
        $urlWeb = self::$urlWeb;
        if($urlWeb == NULL){
            $urlWeb = self::getBrowserUrl();
            self::$urlWeb = $urlWeb;
        }
        if($urlWeb == $url && $method == $_SERVER["REQUEST_METHOD"]){
            self::checkMiddleware($middleware);
            self::$stop = true;
            $action = explode("@", $action);
            $class = $action[0];
            $action = $action[1];
            $obj = new $class();
            $obj->$action();
        }
    }
    static public function checkMiddleware ($name) {
        if(!$name){
            return true;
        }
        $middlewares = [
            "admin" => "admin"
        ];
        $method = $middlewares[$name];
        self::$method();
    }
}
