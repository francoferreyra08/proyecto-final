<?php
session_start();
if (isset($_SESSION["inicio"])) {
  header("Location:home.php");
}

//Inicializar variables que reciben datos de formulario

$nomu = "";
$fecha = "";
$email = "";
$gene = "";
$clave = "";
$archivo = "";

//Inicializo variables de control de llenado de formulario

$vnomu = false;
$vfecha = false;
$vemail = false;
$vgene = false;
$vclave = false;
$vconfirmarc = false;
$ruser = false;
$vimagen = false;

//Validamos los datos recibidos del formulario

if(isset($_POST["submit"])){
  if($_POST["nomu"] == ""){
    $vnomu = true;
  }else{
    $nomu = $_POST["nomu"];
  }
  if($_POST["fecha"] == ""){
    $vfecha = true;
  }else{
    $fecha = $_POST["fecha"];
  }
  if($_POST["email"] == "" || !filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
    $vemail = true;
  }else{
    $email = $_POST["email"];
  }
  if(!isset($_POST["gene"])){
    $vgene = true;
  }else{
    $gene = $_POST["gene"];
  }
  if($_POST["clave"] == ""){
    $vclave = true;
  }else if($_POST["confirmarc"] == "" || $_POST["clave"] != $_POST["confirmarc"]){
    $vconfirmarc = true;
  }else{
    $clave = $_POST["clave"];
  }


//Validamos que el archivo de usuario exista y validamos que el nombre de usuario (nomu) no este en uso

  if(file_exists("usuarios.json")){
    $usuariosjson = file_get_contents("usuarios.json");
    $usuarios = json_decode($usuariosjson, true);
    if($usuarios){
      foreach ($usuarios as $us){
        if($us["nomu"] == $_POST["nomu"]){
          $ruser = true;
          break;
        }
      }
    }
  }

  //Validamos que la imagen subida sea Apta

  if($_FILES["imagen"]["error"] == UPLOAD_ERR_OK){
    $nomufoto = $_FILES["imagen"]["name"];
    $archivo = $_FILES["imagen"]["tmp_name"];
    $ext = pathinfo($nomufoto, PATHINFO_EXTENSION);

    $nomufotoc = "subido/".$_POST["nomu"].".".$ext;
    }else {
      $vimagen = true;
    }

  //Envio de datos, verificamos que no hayan errores
    echo "nombre: ".$vnomu."correo:".$vemail."fecha: ".$vfecha ."genero:".$vgene."pass: ".$vclave." c clave: ". $vconfirmarc . "Existe ".$ruser;
    if(!$vnomu && !$vfecha && !$vemail && !$vgene && !$vclave && !$vconfirmarc && !$ruser){

      //Encriptamos la password

      $passmd5 = md5($clave);
      $usuario = [
        "nomu" => $nomu,
        "fecha" => $fecha,
        "email" => $email,
        "gene" => $gene,
        "clave" => $passmd5
      ];
      $usuarios[] = $usuario;
      $usuariosjson = json_encode($usuarios, JSON_PRETTY_PRINT);
      file_put_contents("usuarios.json", $usuariosjson);

      //subir imagen
        $sarchivo = dirname(__FILE__);
        $sarchivo = $sarchivo . "/subido/";
        $sarchivo = $sarchivo . $_POST["nomu"] .".". $ext;

        move_uploaded_file($archivo, $sarchivo);
      header("Location:f.php");
      exit;
    }
}
 ?>
 <!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="bootrap/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Jacques Francois Shadow' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Bungee Shade' rel='stylesheet'>
    <link rel="stylesheet" href="bootrap/css/formulario estilos.css">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
     ?>
    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-12">
    <form action="formulario.php" method="post" enctype="multipart/form-data">
    <fieldset >
      <legend class="regis">Registro</legend>
      <label for="nomu">Nombre de Usuario</label><br/>
      <?php if($vnomu){ ?>
        <span>Debe ingresar el nombre de usuario</span><br><?php } ?>
      <input type="text" name="nomu" class="area" value="<?php echo $nomu;?>">
    <br/>
    <br/>
        <label for="fecha">Fecha de Nacimiento</label><br/>
        <?php if($vfecha){ ?>
          <span>Debe ingresar una fecha valida</span><br><?php } ?>
        <input type="date" name="fecha" class="area2" value="<?php echo $fecha;?>">
  <br/>
  <br/>
        <label for="email">Correo-E</label><br/>
        <?php if($vemail){ ?>
          <span>Debe ingresar un correo valido</span><br><?php } ?>
        <input type="email" name="email" class="area" value="<?php echo $email;?>">
  <br/>
  <br/>
        <label for="gene">Genero</label><br/>
        <?php if ($vgene){ ?>
          <span>Seleccione un genero</span><br><?php } ?>
        <label for="gene">Varon</label>
        <input type="radio" name="gene" value="1" class="area">
        <label for="gene">Mujer</label>
        <input type="radio"name="gene" value="2" class="area">
        <label for="gene">Personalizado</label>
        <input type="radio" name="gene" value="3" class="area">
  <br/>
  <br/>
        <Label for = "archivo">Seleccione una foto de perfil</label><br/>
        <input type = "file" name ="imagen">
  <br/>
  <br/>
          <label for="clave">Contraseña</label><br/>
          <?php if($vclave){ ?>
            <span>Debe ingresar una contraseña valida</span><br><?php } ?>
          <input type="password" name="clave" class="area">
      <br/>
      <br/>
      <label for="confirmarc">Confirmar Contraseña</label><br/>
      <?php if($vconfirmarc){ ?>
      <span>Las contraseñas no coinciden</span><br><?php } ?>
      <input type="password" name="confirmarc" class="area">
      <br/>
      <br/>
        <input type="submit" name="submit" value="registrarse">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <h3></h3>
      </a>
    </form>

      <br/>
      <a href="index.php" class="neon">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
       Inicio
    </a>



        <a href="faq.php" class="neon">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
               faq
        </a>

        </div>
        </fieldset>

        <script src="bootstrap/js/bootstrap.min.js"></script>
         <script src="bootstrap/js/jquery.js"></script>
      </body>
      </html>
