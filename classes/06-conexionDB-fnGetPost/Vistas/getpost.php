<?php
  
  echo $_POST['nombre'];
  echo "<br>";
  echo $_POST['direccion'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>

<div class="container-fluid">
  <div class="panel panel-primary" >
     <div class="panel-heading">
        <h4 class="title">Practica Get Post</h4>
     </div>
     <div class="panel-body">
     <form action="" method="post">

     <div class="form-group col-lg-6 col-sm-6">
        <label for="">Nombre</label>   
        <input type="text" name="nombre">
        </div>
        <div class="form-group col-lg-6 col-sm-6">
        <label for="">Direccion</label>   
        <input type="text" name="direccion">
        </div>
        <div class="form-group col-lg-6 col-sm-6">
        <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
     </div>

     </form>   
     

  </div>
</div>
    
</body>
</html>