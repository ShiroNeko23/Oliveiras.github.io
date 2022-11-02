<?php
 class ConexionBD{
   private $psw;
   private $usr;
   private $host;
   private $port;
   private $bd;
   private $conec;
   
   public function __construct(){
    $this->host="34.151.225.212";
    $this->usr="sa";
    $this->psw='Qxe"m{I#1ydn/NPC';
    $this->bd="dbsisWebLirios";
    $this->port="3306";
   }
   public function conectar(){
       $this->conec=new mysqli($this->host,$this->usr,$this->psw,$this->bd,$this->port);
       if($this->conec->connect_error){
        die("No se logro la conexion: ".$this->conec->connect_error);
       }else{
        return $this->conec;
       }
   }
   
 }
?>