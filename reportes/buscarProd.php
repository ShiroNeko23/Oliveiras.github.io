<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciando con PHP</title>
    <script src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    $(document).ready(function() {
        document.getElementById('cbBuscarClientes').selectedIndex = 0;
    });
    </script>
</head>

<body>
    <?php include('nav.php');?>
    <br><br><br>

    <form method="POST" class="container-fluid card container-md" style="width: 25rem;">

        <fieldset class="card-body">
            <legend>Reporte de Stock de Productos</legend>
            <center><img src="imagenes/lavanda.png" alt="" sizes="" srcset=""></center>
            <div class="mb-3">
                <label for="form-control" class="form-label">Variedad de Productos</label>
                <select class="form-select" name="cbBuscarProdu" id="cbBuscarProdu" required>
                    <option id="0" value="0">Selecione una Variedad</option>
                    <?php
                                    include_once('../Conection/bd.php');
                                    $consulta1='select * from variedad_producto;';
                                    $ejecutar1=mysqli_query($conn,$consulta1) or die(mysqli_error($conn));
                                ?>
                    <?php foreach($ejecutar1 as $opciones): ?>
                    <option id="<?php echo $opciones['id_variedad']?>" value="<?php echo $opciones['nom_variedad']?>">
                        <?php echo $opciones['nom_variedad']?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="form-control" class="form-label" required>Tipo de Stock</label>
                <select class="form-select" name="cbx2" id="cbx2">
                    <option id="0" value="0">Selecione un Tipo</option>
                    <option id="1" value="Disponible">disponible</option>
                    <option id="2" value="No disponible">No disponible</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" onclick="validarfor(event)" formtarget="_blank">Generar
                Reporte</button>
        </fieldset>
    </form>
    <script>
    function validarfor(e) {
        var cb1 = document.getElementById("cbBuscarProdu").value;
        var cb2 = document.getElementById("cbx2").value;
        if (cb1 == '0' || cb2 == '0') { //COMPRUEBA CAMPOS VACIOS
            alert("Los campos no pueden quedar vacios");
        } else {
            location.href = 'ProductosV.php?idcb1=' + cb1 + '&idcb2=' + cb2;
        }
        e.preventDefault();
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous">
    </script>
</body>

</html>