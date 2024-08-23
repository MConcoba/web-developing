<?php
  
  // primera forma de conectar a mysql

  /*$con = mysqli_connect("localhost","root","Umg$2023","ALUMNOSs"); 
   
  if($con)
  {
    echo "Se conecto a Mysql";
  }
  else
  {
    echo "No se pudo conectar";
  }*/

 /* $con = new mysqli("localhost","root","Umg$2023","ALUMNOS"); 
   
  if($con)
  {
    echo "Se conecto a Mysql por medio de la segunda forma";
  }
  else
  {
    echo "No se pudo conectar por la segunda forma";
  }
*/

//Conexion por medio PDO

$servidor = "mysql:dbname=ALUMNOS; host=localhost";
$usuario = "root";
$clave = "Umg$2023";

$con = new PDO($servidor,$usuario,$clave);
   
  if($con)
  {
    echo "Se conecto a Mysql por medio PDO";
  }
  else
  {
    echo "No se pudo conectar por PDO";
  }


?>

