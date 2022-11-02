<?php include('../../../Conection/bd.php');?>
<?php
    $var=$_POST['var'];
    $des=$_POST['desc'];
    $prec=$_POST['prec'];
    $cant=$_POST['cant'];
    $cal=$_POST['cal'];
    $query="call pc_producto('$des','$prec','$cant','$var','$cal');";
    if($var!='' & $des!=''& $prec!=''& $cant!=''& $cal!=''){
        $result=mysqli_query($conn,$query) or $r= mysqli_error($conn);
        if($result){
            $_SESSION['message']='Producto Registrado Correctamente';
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