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
    $animal = edit();
    $action = 'update';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <title>Masinos</title>
</head>
<body>
  <form class="form" action="" method="POST"
  <input type="hidden" name="action" value="<?=$action?>">
  <div class="form-row">
    <div class="form-group col-sm-6">
      <label for="inputEmail4">Manufacturer</label>
      <input class="form-control" type="text" name="Manufacturer" value=<?= (isset($cars))? $cars['Manufacturer'] : "" ?>">
</div>
</div>
         <div class="form-row">
         <div class="form-group col-sm-6">
      <label for="inputEmail4">Model</label>
        <input class="form-control" type="text" name="Model" value=<?= (isset($cars))? $cars['Model'] : "" ?>">
</div>
</div>
        <div class="form-group col-sm-6">
      <label for="inputEmail4">Year</label>
      <input class="form-control" type="text" name="Year" value=<?= (isset($cars))? $cars['Year'] : "" ?>">
</div>

      <div class="form-row">
         <div class="form-group col-sm-6">
      <label for="inputEmail4">Colour</label>
      <input class="form-control" type="text" name="Colour" value=<?= (isset($cars))? $cars['Colour'] : "" ?>">
</div>
</div>
       <div class="form-row">
         <div class="form-group col-sm-6">
      <label for="inputEmail4">Distance</label>
      <input class="form-control" type="text" name="Distance" value=<?= (isset($cars))? $cars['Distance'] : "" ?>">
</div>
</div>
       <div class="form-row">
         <div class="form-group col-sm-6">
      <label for="inputEmail4">Fuel</label>
      <input class="form-control" type="text" name="Fuel" value=<?= (isset($cars))? $cars['Fuel'] : "" ?>">
    </div>
</div>

  <?php if(!isset($cars)){
            echo '<button class="btn btn-primary" type="submit">Pridėti automobili</button>';
    }else{
            echo '
            <input type="hidden" name="id" value="'. $cars['id'].' ">
            <button class="btn btn-info" type="submit">Atnaujinti </button>';
    } 
    ?>

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
        
            <td> <?= ++$count."/".$cars['id']  ?> </td>
                <td> <?= $cars['Manufacturer']  ?> </td>
                <td> <?= $cars['Model']  ?> </td>
                <td> <?= $cars['Year']  ?> </td>
                <td> <?= $cars['Colour']  ?> </td>
                <td> <?= $cars['Distance']  ?> </td>
                <td> <?= $cars['Fuel']  ?> </td>
                <td>
                    <a class="btn btn-success" href="?id=<?= $cars['id']?>">edit</a></td>
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