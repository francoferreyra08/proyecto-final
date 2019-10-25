<?php

if (isset($_cookies["recordar"])) {
  echo $_cookies["recordar"];
}

  session_start();
if(isset($_GET["msj"])){
  echo "<h2>".$_GET["msj"]."</h2>";
}

if (isset($_SESSION["inicio"])) {
  header("Location:home.php");
}



 ?>


<html>
  <head>
    <meta charset="utf-8">
    <link href='https://fonts.googleapis.com/css?family=Bungee Shade' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0,minimun-sacale=1.0">
    <link rel="stylesheet" href="bootrap/css/index212.css">
    <title>on point</title>
  </head>
  <body>

    <header>
  <div class="inicio">
          <div class="inicioo">

               <h1>ONPOINT</h1>

          </div>
          <div class="iniciooo">
              <form class="formu"  action="funciones/logear.php" method="post">

              <div class="usuario">  <label for="user">Usuario</label><br>
                   <input type="text" name="nomu" class="barra"><br><br>
              </div>

              <div class="contra">  <label for="clave">Contraseña</label><br>
                   <input type="password" name="clave" class="barra"><br>
            <div class="olvidala">  <a href="faq.php">  ¿olvidaste tu contraseña? </a>
            </div>
              </div>

              <div>
                <input type="submit" name="submit" class="neon" value="Entrar">
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>

                </a><br><br>
              </div>
            <div class="recordar">
                <input type="checkbox" name="recordarme" value="1">
                <label for="recordarme">Recordarme</label>

            </div>

              </form>

          </div>
  </div>
</header><br><br>
 <section class="section1">   <br><br><br>
   <div class="letras">
     <br><br><br><br><br><br>
     <h1>¿Que es OnPoint?</h1><br><br>

    <h2> <span>On</span><span>line Check</span><span>Point</span><span> es una red social de Gamers para Gamers, aquí podrás conocer personas de todo el mundo que
       tengan los mismos gustos que tú, compartir tu opinión, tus logros,
       consultar dudas a jugadores que sean más experimentados, y mucho más.</span></h2>
    <br><br><br><br><br><br><br><br>
   <div class="botones">
    <a class="neon" href="formulario.php">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
          Registrate
      </a>
      <br><br><br>

    </div>
  </div>
 <div class="mundo">
    <img src="imagenes/mundillo2.png" alt="">
 </div>
 </section>
 <footer>
  <a class="copy"> OnPoint &copy; 2019</a>
<center><a href="faq.php" class="faq">FAQ</a></center>
</footer>
  </body>
</html>
