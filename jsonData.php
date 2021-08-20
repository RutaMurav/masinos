<?php

init();

function init()
{
    if(!file_exists("./data.txt")){
        file_put_contents("./data.txt","[]");
        file_put_contents("./id.txt", 0);
    }
}

function edit(){
    foreach (getData() as $cars) {
        if($cars['id'] == $_GET['id']){
           return $cars;
        }
     }

}

function store(){
    $data = getData();
    $cars['id'] = newId();
    $cars['Manufaturer'] = $_POST['Manufacturer'];
    $cars['Model'] = $_POST['Model'];
    $cars['Year'] = $_POST['Year'];
    $cars['Colour'] = $_POST['Colour'];
    $cars['Distance'] = $_POST['Distance'];
    $cars['Fuel'] = $_POST['Fuel'];
    
    $data[] = $cars;
    setData($data);
}

function getData(){
    $arr = json_decode( file_get_contents('./data.txt'), 1);
    foreach ($arr as &$entry) {
        $entry = (array) $entry;
    }
    return $arr;
}
function setData($arr){
    file_put_contents('./data.txt',json_encode($arr));
}

function newId(){
    $id = file_get_contents('./id.txt') ;//4
    $id++;//5
    file_put_contents('./id.txt',$id);//5
    return $id;//5
}

function destroy(){
    $data = getData();
    foreach ($data as $key => $cars) {
        if($cars['id'] == $_POST['id']){
         unset($data[$key]);
         setData($data);
         return;
        }
    }
}

function update(){
    $data = getData();
    foreach ($data as &$cars) {
        if($cars['id'] == $_POST['id']){
    $cars['Manufaturer'] = $_POST['Manufacturer'];
    $cars['Model'] = $_POST['Model'];
    $cars['Year'] = $_POST['Year'];
    $cars['Colour'] = $_POST['Colour'];
    $cars['Distance'] = $_POST['Distance'];
    $cars['Fuel'] = $_POST['Fuel'];
    setData($data);
    return;
        }  
    }
}

?>