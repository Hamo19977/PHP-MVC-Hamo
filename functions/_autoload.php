<?php


spl_autoload_register("_autoload");

function _autoload($className){

    $folder = "classes";
    $extention = ".php";

    $fullPath = "$folder/$className$extention";

    if(!file_exists($fullPath)){
        $folder = "model";
        $extention = ".php";

        $fullPath = "$folder/$className$extention";
    }

    include $fullPath;
}
