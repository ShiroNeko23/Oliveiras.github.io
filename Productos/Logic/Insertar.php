<?php include('../../Conection/bd.php'); ?>
<?php
    if(isset($_POST['btnregistrar'])){
        $tipo=$_POST['cbx1'];
        $nomva=$_POST['txt1'];
        $consulta2="select count(*) from variedad_producto where nom_variedad='$nomva'";
        $resultado1=mysqli_query($conn,$consulta2);
        $consulta = "call pc_variedad('$nomva','$tipo')";
        if($tipo!='' && $nomva!=''){
            $resultado2=mysqli_query($conn,$consulta) or $r= mysqli_error($conn);
            if($resultado2){
                $_SESSION['message']='Variedad Registrada Correctamente';
                $_SESSION['message_type']='success';
            }else{
                $_SESSION['message']=$r;
                $_SESSION['message_type']='warning';
            }
        }else{
            $_SESSION['message']='Ingrese Valores Validos';
            $_SESSION['message_type']='warning';
        }
       header('Location: ../producto.php');
    }
?>