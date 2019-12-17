<?php
$login = $_POST["nomu"];
$pass = $_POST["clave"];
$clave = md5($pass);

$usuariosjson = file_get_contents("../usuarios.json");
$usuarios = json_decode($usuariosjson, true);

if($usuarios){
  foreach ($usuarios as $us){
    if($us["nomu"] == $login){
      if ($clave == $us["clave"]){
        session_start();



        $_SESSION["inicio"] = "SI";
        $_SESSION["nomu"] = $login;
        $_SESSION["nomu"] = $us["nomu"];
        header("location:../home.php");
        exit;
    }else {
      header("location:../index.php?msj=usuario o clave invalido");
      }
  }else{
      header("location:../index.php?msj=usuario o clave invalido");
       }
  }
}

?>
