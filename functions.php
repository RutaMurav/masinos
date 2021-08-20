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
    $cars['Manufacturer'] = $_POST['Manufacturer'];
    $cars['Model'] = $_POST['Model'];
    $cars['Year'] = $_POST['Year'];
    $cars['Colour'] = $_POST['Colour'];
    $cars['Distance'] = $_POST['Distance'];
    $cars['Fuel'] = $_POST['Fuel'];
    
    $_SESSION['id']++;

    $_SESSION['cars'][] = $cars;
}

function destroy(){
    foreach ($_SESSION['Masinos'] as $key => $cars) {
        if($cars['id'] == $_POST['id']){
         unset($_SESSION['Masinos'][$key]);
         return;
        }
    }
}

function update(){
    foreach ($_SESSION['Masinos'] as &$cars) {
        if($cars['id'] == $_POST['id']){
        $cars['id'] = $_SESSION['id'];
    $cars['Manufaturer'] = $_POST['Manufacturer'];
    $cars['Model'] = $_POST['Model'];
    $cars['Year'] = $_POST['Year'];
    $cars['Colour'] = $_POST['Colour'];
    $cars['Distance'] = $_POST['Distance'];
    $cars['Fuel'] = $_POST['Fuel'];
            return;
        }  
    }
}


?>