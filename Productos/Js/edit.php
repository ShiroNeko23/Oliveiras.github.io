<?php include('../../Conection/bd.php'); ?>
<?php
        $idvar=$_GET['idvar'];
        $nomvar=$_GET['txt1'];
        $idtipo=$_GET['cbx1'];
        $consulta = "call pc_updateVar('$nomvar','$idtipo','$idvar');";
        $resultado=mysqli_query($conn,$consulta);
        $_SESSION['message']='Variedad Editada Corectamente';
        $_SESSION['message_type']='success';
    header('Location: ../producto.php');
?>