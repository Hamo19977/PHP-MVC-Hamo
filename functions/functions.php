<?php

function dd($toDie,...$dd){
    if(gettype($toDie) != "boolean"){
        array_unshift($dd, $toDie);
        $toDie = true;
    }
    echo "<pre style='
	background: black;
	color: white;
	padding: 20px;
	font-size: 20px;
	font-family: system-ui;'>";
    echo "<hr>";
    foreach($dd as $d){
        print_r($d);
        echo "<br>";
        echo "<hr>";
        echo "<br>";
    }
    if($toDie == true){
        die;
    }
}

function view($page,$variables=[])
{
    if(count($variables)){
        extract($variables);
    }
    require $page;
}
