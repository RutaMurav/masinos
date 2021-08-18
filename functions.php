<?php

init();
function init()
{
    session_start();
    if( !isset( $_SESSION['cars'])  ){
        $_SESSION['cars'] = [];
        $_SESSION['id'] = 1;
    }
}



function edit(){
    foreach ($_SESSION['cars'] as $entry) {
        if($entry['id'] == $_GET['id']){
           return $entry;
        }
     }
}

function store(){
    $cars = [];
    $cars['id'] = $_SESSION['id'];
    $cars['manufaturer'] = $_POST['manufacturer'];
    $cars['model'] = $_POST['model'];
    $cars['year'] = $_POST['year'];
    $cars['colour'] = $_POST['colour'];
    $cars['distance'] = $_POST['distance'];
    $cars['fuel'] = $_POST['fuel'];
    
    $_SESSION['id']++;

    $_SESSION['cars'][] = $cars;
}

function destroy(){
    foreach ($_SESSION['athlete'] as $key => $cars) {
        if($cars['id'] == $_POST['id']){
         unset($_SESSION['athlete'][$key]);
         return;
        }
    }
}

function update(){
    foreach ($_SESSION['Masinos'] as &$cars) {
        if($cars['id'] == $_POST['id']){
        $cars['id'] = $_SESSION['id'];
    $cars['manufaturer'] = $_POST['manufacturer'];
    $cars['model'] = $_POST['model'];
    $cars['year'] = $_POST['year'];
    $cars['colour'] = $_POST['colour'];
    $cars['distance'] = $_POST['distance'];
    $cars['fuel'] = $_POST['fuel'];
            return;
        }  
    }
}


?>