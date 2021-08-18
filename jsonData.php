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
    $cars['manufaturer'] = $_POST['manufacturer'];
    $cars['model'] = $_POST['model'];
    $cars['year'] = $_POST['year'];
    $cars['colour'] = $_POST['colour'];
    $cars['distance'] = $_POST['distance'];
    $cars['fuel'] = $_POST['fuel'];
    
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
    foreach ($data as $key => $animal) {
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
    $cars['manufaturer'] = $_POST['manufacturer'];
    $cars['model'] = $_POST['model'];
    $cars['year'] = $_POST['year'];
    $cars['colour'] = $_POST['colour'];
    $cars['distance'] = $_POST['distance'];
    $cars['fuel'] = $_POST['fuel'];
    setData($data);
    return;
        }  
    }
}

?>