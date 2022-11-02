<?php
 class ConexionBD{
   private $usr;
   private $psw;
   private $bd;
   private $host;
   private $port;
   private $conec;
   
   public function __construct(){
    
    $this->usr="sa";
    $this->psw='Qxe"m{I#1ydn/NPC';
    $this->bd="dbsisWebLirios";
    $this->host="34.151.225.212";
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