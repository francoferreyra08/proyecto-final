<?php

  /**
   *
   */
  class Usuario
  {
    protected $nombre;
    protected $fecha;
    protected $email;
    protected $gene;
    protected $clave;

      public function getNombre(){
        return $this->nombre;
    }
    public function setNombre(String $nombre){
      $this->nombre=$nombre;
    }




    public function getFecha(){
      return $this ->fecha
      }
      public function seFecha(String $fecha){
        $this->fecha=$fecha;
      }




      public function getEmail(){
        return $this->email;
      }
      public function setMmail(string $email){
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $email=true;

    }else {
      $this->mail=$email;
      $email = false=;
    }
      return $email;



      public function getGene(){
        return $this->genero;
    }
    public function setGene(String $gene){
      $this->genero=$gene;
    }



    public function getClave(){
        return $this->clave;
    }
    public function setClave(){
      if(strlen($clave)>4){
        $this->$clave=$this->encriptarClave($clave);
        $cclave=false;

      }else {
        $cclave= true;
      }
      return $cclave;


    }
    private function encriptarClave(String $clave){
      $cclave=md5($clave);
    return $cclave;




    ?>
