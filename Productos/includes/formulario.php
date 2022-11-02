<div class="frm2">
    <div class="container p-4" id="contenedorprincipal">
        <div class="row" id="formprincipal">
            <div class="col-md-4">
                <?php if(isset($_SESSION['message'])){?>
                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php session_unset();}?>
                <div class="card card-body">
                    <form action="Logic/Insertar.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Nombre de Variedad</label>
                            <input type="text" name="txt1" id="txt1" class="form-control"
                                placeholder="Ingrese Nombre de la Variedad" autofo>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tipo de Variedad</label><br>
                            <label>
                                <select name="cbx1" id="cbx1">
                                    <option value="">Selecione un Tipo Variedad</option>
                                    <?php
                                    include('../Conection/bd.php');
                                    $consulta1='select * from tipo_variedad;';
                                    $ejecutar1=mysqli_query($conn,$consulta1) or die(mysqli_error($conn));
                                ?>
                                    <?php foreach($ejecutar1 as $opciones): ?>
                                    <option id="<?php echo $opciones['id_tipovar']?>"
                                        value="<?php echo $opciones['id_tipovar']?>">
                                        <?php echo $opciones['Tipo_variedad']?>
                                    </option>
                                    <?php endforeach ?>


                                </select>
                            </label>

                        </div>
                        <button type="submit" class="btn btn-primary" name="btnregistrar">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="vartb">
    <div class="col-md-8" id="contendortabla">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por Variedad"
            title="Digita una Variedad">
        <table class="table table-scroll table-striped table-bordered table-sm" id="contendortabla2" cellspacing="0">
            <thead>
                <tr>
                    <th class="th-sm">Variedad Producto</th>
                    <th class="th-sm">Tipo de Variedad</th>
                    <th class="th-sm">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                            $query="select * from v_variedades;";
                            $result=mysqli_query($conn,$query);
                            while($row = mysqli_fetch_array($result)){?>
                <tr>
                    <td><?php echo $row['Variedad Producto']?></td>
                    <td><?php echo $row['Tipo Variedad']?></td>
                    <td>
                        <a vari="<?php echo $row['idvar'];?>" tipo="<?php echo $row['fk_Idtipovar'];?>"
                            nomvar="<?php echo $row['Variedad Producto']?>" href="#" class="btn btn-secondary edit_var"
                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fas fa-marker"></i>
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
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
        td = tr[i].getElementsByTagName("td")[0];
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