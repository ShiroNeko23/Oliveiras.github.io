<?php include('../../../Conection/bd.php');?>
<?php 
    $valor=$_POST['var'];
    $consulta="SELECT `Tipo Variedad` from v_variedades where `idvar`='$valor';";
    $result=mysqli_query($conn,$consulta);
     while($ver=mysqli_fetch_row($result)){
        $option='<option values='.$ver[0].'>'.utf8_encode($ver[0]).'</option>';
     }
     echo $option; 
?>