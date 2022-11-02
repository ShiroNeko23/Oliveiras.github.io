<?php
include('../../Conection/bd.php');
$nombre=$_POST['t1'];
$correo=$_POST['t3'];
$telefono=$_POST['t4'];
$identificacion=$_POST['t2'];
$query="call pc_emp('$nombre','$correo','$telefono','$identificacion');";
try {
    $result=mysqli_query($conn,$query) or $r=mysqli_error($conn);
} catch (Exception $r) {
}
return header("Location:../Presentacion/empresa.php");
?>