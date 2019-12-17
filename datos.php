<?php
include("conex.php");

$usuariosjson = file_get_contents("usuarios.json");
$usuarios = json_decode($usuariosjson, true);

foreach ($usuarios as $key) {

  $nombre=$key["nomu"];
  $fecha=$key["fecha"]  ;
  $email=$key["email"];
  $gene=$key["gene"];
  $clave=$key["clave"];



  $db->beginTransaction();
  $stmt= $db->prepare("INSERT INTO usuario (nomu, fecha, email, genero, clave)
  values ('$nombre', '$fecha', '$email', '$gene', '$clave')");
  var_dump($stmt);
  echo "<hr />";

  //Ejecuto
  $stmt->execute();

  //comit de la transsacción
  $db->commit();

}

 ?>
