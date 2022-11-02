<?php 
    include ('../../Conection/bd.php');
    $identificacion=$_POST['id'];
    $query="select count(*) as res from vt_clientes where identificacion='$identificacion';";
    $result=mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($result)){
        if($row['res']==1){
            $query2="select * from vt_clientes where identificacion='$identificacion';";
            $result2=mysqli_query($conn,$query2);
            while($row = mysqli_fetch_array($result2)){
                echo "<div class='container border'>Cliente ".$row['nombre']."</div><br><br>";
                include('../includes/cuerpo.php');
            }
        }
        else{
            echo '0';
        }
    }
?>