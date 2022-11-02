<?php include('../../../Conection/bd.php');?>
<?php
    $prod=$_POST['idprod'];
    $var=$_POST['idvar'];
    $des=$_POST['des'];
    $prec=$_POST['prec'];
    $cant=$_POST['cantd'];
    $cal=$_POST['cali'];
    $query="call pc_up_prod('$prod','$des','$prec','$cant','$var','$cal');";
    if($prod!='' & $var!=''& $des!=''& $prec!=''& $cant!=''& $cal!=''){
        $result=mysqli_query($conn,$query) or $r= mysqli_error($conn);
        if($result){
            $_SESSION['message']='Producto Editado Correctamente';
            $_SESSION['message_type']='success';
        }else{
            $_SESSION['message']=$r;
            $_SESSION['message_type']='warning';
        }
    }else{
        $_SESSION['message']='Ingrese Valores en el Formulario';
        $_SESSION['message_type']='warning';
    }

?>