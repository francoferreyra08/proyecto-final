<?php
session_start();

if (!isset($_SESSION["inicio"])) {
  header("Location:index.php");
}

 ?>

<html>
  <head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/estilo.css">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href='https://fonts.googleapis.com/css?family=Eater' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Berkshire Swash' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Bungee Shade' rel='stylesheet'>
    <link rel="stylesheet" href="bootrap/css/home2.css">
    <meta charset="utf-8">
    <title>home</title>
  </head>
  <body>
    <header class="row">
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
      <h1 class="titulo"> OnPoint</h1>
      <div class="logo">
        <img src="imagenes/mundillo2.png" width="120">
      </div>
      <nav>
        <ul>
        <li><a href="#">inicio</a></li>
        <li><a href="#">perfil</a></li>
        <li><a href="#">cuenta</a> </li>
        <li><a href="funciones/salir.php">salir</a> </li>

          </ul>
      </nav>
      <form >
          <fieldset>

        <input type="search" placeholder="Busqueda..."></input>
        <button type="submit">
        <ion-icon name="search" ></ion-icon>

        </button>
      </fieldset>
      </form>
      </div>


    </header>
    
    <div class="row">
<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">

    <div class="primero">

    <ul>
      <li>amigos</li>
      <li>checks</li>
      <li>noticias</li>
    </ul>

     </div>


     </div>
  </div>
  <img src="https://octodex.github.com/images/daftpunktocat-thomas.gif" id="octocat" alt="octocat-gif" />
    <center><h1>Pagina en desarrollo</h1></center>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
     <script src="bootstrap/js/jquery.js"></script>
  </body>
</html>
