<?php 
    include ('../../Conection/bd.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <script src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../CSS/EstilosVentas.css">
</head>

<body>
    <?php include('../includes/nav.php')?>
    <div class="container border" style="width: 350px;position:absolute;left: 50px;top: 100px;border-radius: 15px;">
        <form action="" method="">
            <div class="form-group ">
                <label>Identificacion</label><br>
                <input type="number" class="form-control" placeholder="Ingrese Identificacion" name="identi" id="identi"
                    maxlength="11"><br>
                <button class="btn btn-primary" id="botenv">Accion</button><br><br>
            </div><br>
        </form>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por Variedad"
            title="Digita una Variedad"
            style="position: relative;left: 180%;top: -180px; border-radius: 10px;width: 400px;height:40px ;">
    </div>
    <form action="repcom.php" method="POST">
        <input type="submit" id="btnCOM" name="btnCOM" class="btn btn-primary"
            style="position:absolute;top: 350px;left: 50px; width: 150px;" value="Comprobante" formtarget="_blank" />
    </form>
    <table class="table table-bordered table-hover" id="contendortabla2" cellspacing="0"
        style="position: absolute; overflow-y: auto; height: 200px; width: 600px; top: 25%;left: 50%;">
        <thead style="position: absolute;">
            <tr>
                <th style="width: 71px;">Codigo</th>
                <th style="width: 75px;">Variedad</th>
                <th style="width: 120px;">T.Variedad</th>
                <th style="width: 30px;">Calibre</th>
                <th style="width: 112px;">Cantidad</th>
                <th style="width: 30px;">Precio</th>
            </tr>
        </thead>
        <tbody style="position: absolute; overflow-y: auto; height: 200px; width: 600px; top: 20%;left: 0%;">
            <?php 
                            $query="select * from v_producto where cantidad_producto>0;";
                            $result=mysqli_query($conn,$query);
                            $valor=0;
                            while($row = mysqli_fetch_array($result)){?>
            <tr id="<?php echo $valor;?>">
                <td style="width: 71px;"><?php echo $row['id_Producto']?></td>
                <td style="width: 85px;"><?php echo $row['nom_variedad']?></td>
                <td style="width: 120px;"><?php echo $row['Tipo_variedad']?></td>
                <td style="width: 70px;"><?php echo $row['calibre']?></td>
                <td style="width: 112px;"><?php echo $row['cantidad_producto']?></td>
                <td style="width: 65px;"><?php echo $row['precio_paquete']?></td>
            </tr>
            <?php $valor++;} ?>
        </tbody>
    </table>
    <div class="container" style="position:absolute;left: 50px;top: 450px;border-radius: 15px;">
        <div id="valor"></div>
    </div>

</body>
<script>
document.getElementById('identi').focus();
$('#botenv').click(function(e) {
    var iden = document.getElementById('identi').value;
    var datos = "id=" + iden;
    $.ajax({
        url: "proc.php",
        data: datos,
        type: 'POST',
        success: function(res) {
            if (res == 0) {
                window.location = "../../Cliente/Presentacion/cliente.php";
            } else {
                $('#valor').html(res);
            }
        }
    });
    document.getElementById('identi').blur();
    e.preventDefault();
});

function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("contendortabla2");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
</script>
<script type="text/javascript" src="../JS/funciones.js"></script>

</html>