<?php

trait RouteTrait {

    static public function goUrl($url){
        header("location: $url");
        die;
    }

    static public function goToUser(){
        self::goUrl("/user");
    }

}
