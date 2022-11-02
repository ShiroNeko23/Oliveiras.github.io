<?php include('../../Conection/bd.php');?>
<?php
$nom=$_POST['nom'];
$app=$_POST['ap'];
$apm=$_POST['apm'];
$cor=$_POST['cor'];
$tel=$_POST['tel'];
$ident=$_POST['ident'];
$idtipoiden=$_POST['cbx1'];
$query="call pc_Cliente('$nom','$app','$apm','$cor','$tel','$ident','$idtipoiden');";
try {
    $result=mysqli_query($conn,$query) or $r=mysqli_error($conn);
} catch (Exception $r) {
    
}
return header("Location:../Presentacion/cliente.php");
?>