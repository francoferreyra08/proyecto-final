<?php
  /**
   *
   */
  class Usuario {


    protected $nombre;
    protected $fecha;
    protected $email;
    protected $gene;
    protected $clave;




    public function getMail(){
        return $this->mail;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getClave(){
        return $this->clave;
    }
    public function setMail(String $correo){
      if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
        $correon=true;
      }else{
        $this->mail= $correo;
        $correon=false;
    }
    return $correon;
  }
    public function setNombre(String $nom){
        $this->nombre= $nom;
    }
    public function setClave(String $cla){
        if (strlen($cla)>3){
     $this->clave=$this->encriptarClave($cla);
        $cclave=false;
      }else {
        $cclave=true;
      }
      return $cclave;
    }

    public function saludar(){
        $hola= "Hola ".$this->nombre;
        return $hola;
    }
    //encriptar clave:
    private function encriptarClave(string $cla){
    $eclave=MD5($cla);

    return $eclave;
    }
  }

 ?>
