<?php  
include("cn.php");
$sql = "SELECT * from v_compras;";
$resultado=mysqli_query($mysqli,$sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylos2.css">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="eliminar_venta.php" method="POST">
            <input type="text" name="boleta">
            <input type="submit" name="btn" value="Buscar">
        </form>
    </div>
    <div id="user-table">
        <h2>Vista de las compras</h2>
        <table name="vi_compras">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>COMPROBANTE</th>
                    <th>DESTINO</th>
                    <th>MONTO</th>
                    <th>IGV</th>
                    <th>FECHA</th>
                    <th>TIPO</th>
                    <th>IDENTIFICACIÓN</th>
                    <th>NOMBRES</th>
                    <th>CORREO</th>
                    <th>TELEFONO</th>
                    <th>TIPO DE PAGO</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            
                <?php 
                while($row=mysqli_fetch_assoc($resultado)) {?>
                <tr>
                    <th><?php echo $row['ID']?></th>
                    <th><?php echo $row['COMPROBANTE']?></th>
                    <th><?php echo $row['destino']?></th>
                    <th><?php echo $row['MONTO']?></th>
                    <th><?php echo $row['IGV']?></th>
                    <th><?php echo $row['FECHA']?></th>
                    <th><?php echo $row['tipo_identificacion']?></th>
                    <th><?php echo $row['IDENTIFICACIÓN']?></th>
                    <th><?php echo $row['NOMBRES']?></th>
                    <th><?php echo $row['CORREO']?></th>
                    <th><?php echo $row['TELEFONO']?></th>
                    <th><?php echo $row['TIPOPAGO']?></th>
                    <th><a class="Eliminar" href="eliminar_venta.php?id_c=<?php echo $row['ID']?>">ELIMINAR</a></th>
                    <th><a href="index.php?id_c=<?php echo $row['ID']?>">REPORTE</a></th>
                </tr> 
                <?php } ?>
              
            </tbody>
        </table>
    </div>
</body>
</html>