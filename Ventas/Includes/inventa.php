<?php 
    include ('../../Conection/bd.php');
    $nombre=$_POST['cli'];
    $destino=$_POST['des'];
    $monto=$_POST['monto'];
    $idtipopago=$_POST['idtipp'];
    $idtipocomprobante=$_POST['idtipcom'];
    $query="SELECT id_cliente from cliente where identificacion='".$nombre."';";
    $result=mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($result)){
        $idcliente=$row['id_cliente'];
    }
    $query2="CALL in_ven('$destino','$monto','$idcliente','$idtipopago','$idtipocomprobante');";
    $result2=mysqli_query($conn,$query2) ;


    echo $result2;
?>