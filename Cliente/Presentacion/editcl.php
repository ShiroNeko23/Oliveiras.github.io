<?php
include('../../Conection/bd.php');
$idcl=$_POST['lbidcl'];
$iddg=$_POST['lbiddg'];
$nom=$_POST['txt1'];
$app=$_POST['txt2'];
$apm=$_POST['txt3'];
$cor=$_POST['txt4'];
$tel=$_POST['txt5'];
$ident=$_POST['txt6'];
$idtipoiden=$_POST['cbx1'];
echo $idtipoiden;
$query="call pc_ecl('$idcl','$idtipoiden','$iddg','$nom','$app','$apm','$cor','$tel','$ident');";
try {
    $result=mysqli_query($conn,$query) or $r=mysqli_error($conn);
    $_SESSION['message']=$r;
    $_SESSION['message_type']='warning';
} catch (Exception $r) {
    $_SESSION['message']='Cliente Editado Correctamente';
    $_SESSION['message_type']='success';
}
return header("Location:cliente.php");
?>