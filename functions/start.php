<?php

function start () {

    if($_SESSION["user"]){
        $model = new User();
        $model->me();
    }
}

start();
