<?php

include('./jsonData.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){

if($_POST['action'] == 'create'){
    store();
    header("location:./");
    die;
  }

  if($_POST['action'] == 'update'){
    update();
    header("location:./");
    die;
  }

  if($_POST['action'] == 'destroy'){
    destroy();
    header("location:./");
    die;
  }
}
$action = 'create';

if(isset($_GET['action'])){
    $cars = edit();
    $action = 'update';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

    <form class="form" action="" method="POST">
        <input type="hidden" name="action" value="<?=$action?>">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" >Manufacturer</label>
            <div class="col-sm-4">
                <input class="form-control" type="text" name="Manufacturer" value="<?= (isset($cars))? $cars['Manufacturer'] : "" ?>">
            </div>
         </div>
         <div class="form-group row">
            <label class="col-sm-2 col-form-label" >Model</label>
            <div class="col-sm-4">
                <input class="form-control" type="text" name="name" value="<?= (isset($cars))? $cars['Model'] : "" ?>">
            </div>
         </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label" >Year</label>
            <div class="col-sm-4">
                <input class="form-control" type="text" name="age" value="<?= (isset($cars))? $cars['Age'] : "" ?>">
            </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label" >Colour</label>
            <div class="col-sm-4">
                <input class="form-control" type="text" name="colour" value="<?= (isset($cars))? $cars['Colour'] : "" ?>">
            </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label" >Distance</label>
            <div class="col-sm-4">
                <input class="form-control" type="text" name="distance" value="<?= (isset($cars))? $cars['Distance'] : "" ?>">
            </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label" >Fuel</label>
          <div class="col-sm-4">
                <input class="form-control" type="text" name="fuel" value="<?= (isset($cars))? $cars['Fuel'] : "" ?>">
            </div>
            
         </div>
    <?php if(!isset($cars)){
            echo '<button class="btn btn-primary" type="submit">Pridėti Automobili</button>';
    }else{
            echo '
            <input type="hidden" name="id" value="'. $cars['id'].' ">
            <button class="btn btn-info" type="submit">Atnaujinti duomenis</button>';
    } ?>
    </form>



    <table class="table">
      <tr>
        <th>Id</th> 
        <th>Gamintojas</th> 
        <th>Modelis</th> 
        <th>Pagaminimo metai</th> 
        <th>Spalva</th>
        <th>Rida</th>
        <th>Kuras</th>
        </tr>


        <?php $count = 0; foreach (getData() as $cars) {  ?>
            <tr>
            <td> <?= ++$count."/".$cars['id']  ?> </td>
                <td> <?= $cars['Manufacturer'] ?> </td>
                <td> <?= $cars['Model']  ?> </td>
                <td> <?= $cars['Year']  ?> </td>
                <td> <?= $cars['Colour']  ?> </td>
                <td> <?= $cars['Distance']  ?> </td>
                <td> <?= $cars['Fuel']  ?> </td>
                <td>
                    <a class="btn btn-success" href="?id=<?= $cars['id']  ?>&action=update">edit</a>
                </td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?=$cars['id']?>"  >
                        <input type="hidden" name="action" value="destroy">
                        <button class="btn btn-danger" type="submit">delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>