<div class="frm1">
    <div class="container-fluid container-sm container p-5">
        <?php include('../Includes/alerta.php') ?>
        <div class="row">
            <div class="card card-body mb5 col-md-3">
                <label for="cbx1" class="form-label">Variedad del Producto: </label>
                <select class="form-select" name="cbx1" id="cbx1">
                    <option id="0" value="0">Selecione una Variedad</option>
                    <?php
                                    include('../../Conection/bd.php');
                                    $consulta1='select * from variedad_producto;';
                                    $ejecutar1=mysqli_query($conn,$consulta1) or die(mysqli_error($conn));
                                ?>
                    <?php foreach($ejecutar1 as $opciones): ?>
                    <option id="<?php echo $opciones['id_variedad']?>" value="<?php echo $opciones['id_variedad']?>">
                        <?php echo $opciones['nom_variedad']?></option>
                    <?php endforeach ?>
                </select>&nbsp;
                <div class="mb-3">
                    <label for="cbx2" class="form-label">Tipo Variedad del Producto: </label>
                    <select class="form-control" name="cbx2" id="cbx2" disabled>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="txt2" class="form-label">Precio del Paquete: </label>
                    <input type="numb" class="form-control" id="txt2" name="txt2" placeholder="Example: 29.30">
                </div>
                <div class="mb-3">
                    <label for="cbx3" class="form-label">Calibre del Producto: </label>
                    <select class="form-select" name="cbx3" id="cbx3">
                        <option id="0" value="0">Selecione una Calibre</option>
                        <?php
                                                include('../../Conection/bd.php');
                                                $consulta1='select * from calibre_producto;';
                                                $ejecutar1=mysqli_query($conn,$consulta1) or die(mysqli_error($conn));
                                            ?>
                        <?php foreach($ejecutar1 as $opciones): ?>
                        <option id="<?php echo $opciones['id_calibre']?>" value="<?php echo $opciones['id_calibre']?>">
                            <?php echo $opciones['calibre']?></option>
                        <?php endforeach ?>
                    </select>&nbsp;
                </div>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Description" id="floatingTextarea"
                        maxlength="150"></textarea>
                    <label for="floatingTextarea">Descripción del Producto</label>
                </div><br>
                <div class="mb3" id="containerButton">
                    <button type="button" class="btn btn-outline-success btn-lg" id="btn1"
                        onclick="insertar()">Registrar
                        Producto</button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-outline-info btn-lg" href="#tbdisponible" onclick="divAuto()"
                        id="btn2" data-bs-toggle="collapse" data-bs-target="#tbdisponible" aria-expanded="false"
                        aria-controls="collapseExample">Productos Disponibles</button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-outline-warning btn-lg" href="#tbondisponible"
                        onclick="divAuto2()" id="btn3" data-bs-toggle="collapse" data-bs-target="#tbnodisponible"
                        aria-expanded="true" aria-controls="collapseExample">Productos no Disponibles</button>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <div class="collapse collapse-horizontal" id="tbdisponible">
        <div class="card card-body" id="cdbd">
            <button id="btncls1" type="button" class="btn-close" aria-label="Close" data-bs-dismiss="collapse"
                onclick="divAutox()"></button>
            <div class="col-md-8" id="contendortabla">
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por Variedad"
                    title="Digita una Variedad">
                <table class="table table-scroll table-striped table-bordered table-sm" id="contendortabla2"
                    cellspacing="0">
                    <thead>
                        <tr id="headerstd">
                            <th class="th-sm">Descripcion</th>
                            <th class="th-sm">Tipo de Variedad</th>
                            <th class="th-sm">Variedad Producto</th>
                            <th class="th-sm">Calibre</th>
                            <th class="th-sm">Stock</th>
                            <th class="th-sm">Precio por Paquete</th>
                            <th class="th-sm">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query="select * from v_producto where Disponibilad='Disponible';";
                            $result=mysqli_query($conn,$query);
                            while($row = mysqli_fetch_array($result)){?>
                        <tr>
                            <td><?php echo $row['descripcion']?></td>
                            <td><?php echo $row['nom_variedad']?></td>
                            <td><?php echo $row['Tipo_variedad']?></td>
                            <td><?php echo $row['calibre']?></td>
                            <td><?php echo $row['cantidad_producto']?></td>
                            <td><?php echo $row['precio_paquete']?></td>
                            <td>
                                <a idprod="<?php echo $row['id_Producto'];?>" vari="<?php echo $row['fk_Idvariedad'];?>"
                                    DESC="<?php echo $row['descripcion']?>"
                                    CANT="<?php echo $row['cantidad_producto']?>"
                                    PREC="<?php echo $row['precio_paquete']?>" CAL="<?php echo $row['fk_Idcalibre']?>"
                                    href="#" class="btn btn-secondary edit_var" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <i class="fas fa-marker"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="collapse" id="tbnodisponible">
    <div class="card card-body" id="cdbd">
        <button id="btncls1" type="button" class="btn-close" aria-label="Close" data-bs-dismiss="collapse"
            onclick="divAutox2()"></button>
        <div class="col-md-8" id="contendortabla">
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por Variedad"
                title="Digita una Variedad">
            <table class="table table-scroll table-striped table-bordered table-sm" id="contendortabla2"
                cellspacing="0">
                <thead>
                    <tr id="headerstd">
                        <th class="th-sm">Descripcion</th>
                        <th class="th-sm">Tipo de Variedad</th>
                        <th class="th-sm">Variedad Producto</th>
                        <th class="th-sm">Calibre</th>
                        <th class="th-sm">Stock</th>
                        <th class="th-sm">Precio por Paquete</th>
                        <th class="th-sm">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                            $query="select * from v_producto where Disponibilad='No Disponible';";
                            $result=mysqli_query($conn,$query);
                            while($row = mysqli_fetch_array($result)){?>
                    <tr>
                        <td><?php echo $row['descripcion']?></td>
                        <td><?php echo $row['nom_variedad']?></td>
                        <td><?php echo $row['Tipo_variedad']?></td>
                        <td><?php echo $row['calibre']?></td>
                        <td><?php echo $row['cantidad_producto']?></td>
                        <td><?php echo $row['precio_paquete']?></td>
                        <td>
                            <a idprod="<?php echo $row['id_Producto'];?>" vari="<?php echo $row['fk_Idvariedad'];?>"
                                DESC="<?php echo $row['descripcion']?>" CANT="<?php echo $row['cantidad_producto']?>"
                                PREC="<?php echo $row['precio_paquete']?>" CAL="<?php echo $row['fk_Idcalibre']?>"
                                href="#" class="btn btn-secondary edit_var" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <i class="fas fa-marker"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
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
var clic = 1;

function divAuto() {
    if (clic == 1) {
        document.getElementById("tbdisponible").style.display = "";
        clic = clic + 1;
    } else {
        document.getElementById("tbdisponible").style.display = "none";
        clic = 1;
    }
}

function divAuto2() {
    if (clic == 1) {
        document.getElementById("tbnodisponible").style.display = "";
        clic = clic + 1;
    } else {
        document.getElementById("tbnodisponible").style.display = "none";
        clic = 1;
    }
}

function divAutox2() {
    if (clic == 1) {
        clic = clic + 1;
    } else {
        document.getElementById("tbnodisponible").style.display = "none";
        clic = 1;
    }
}

function divAutox() {
    if (clic == 1) {
        clic = clic + 1;
    } else {
        document.getElementById("tbdisponible").style.display = "none";
        clic = 1;
    }
}
</script>