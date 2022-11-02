<?php 
    include ('../../Conection/bd.php');
    $idproducto=$_POST['idpro'];
    $cantidad=$_POST['canti'];
    $query2="call in_pv('$idproducto','$cantidad');";
    $result2=mysqli_query($conn,$query2);
    echo $result2;
?>