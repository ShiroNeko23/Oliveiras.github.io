<div class="container-fluid container-sm container p-5 frm1">
    <?php include('../Includes/alerta.php') ?>
    <div class="row" style="height: 400px; width: 70%;">
        <div class="card card-body mb5">
            <form action="../includes/insert.php" style="height: 400px;" method="POST">
                <div class="mb-2 col-4">
                    <label for="txt1" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="txt1" name="nom" style="width: 75%;">
                </div>
                <div class="mb-2 col-4" id="app">
                    <label for="txt2" class="form-label">Apellido Paterno</label>
                    <input type="text" class="form-control" id="txt2" name="ap" style="width: 80%;">
                </div>
                <div class="mb-2 col-4
                " id="apm">
                    <label for="txt3" class="form-label">Apellido Materno</label>
                    <input type="text" class="form-control" id="txt3" name="apm" style="width: 80%;">
                </div>
                <div class="mb-3 col-8" id="divcor">
                    <label for="txt4" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="txt4" name="cor" placeholder="example@examples.com">
                </div>
                <div class="mb-3 col-5" id="tel">
                    <label for="txt5" class="form-label">Telefono</label>
                    <input type="num" class="form-control" id="txt5" name="tel" maxlength="9">
                </div>
                <div class="mb-3 col-5" id="iden">
                    <label for="txt6" class="form-label">Identificación</label>
                    <input type="num" class="form-control" id="txt6" name="ident" maxlength="11" onkeyup="idnt();">
                </div>
                <div class="mb-3 col-10" id="selid">
                    <label for="cbx1" class="form-label">Tipo de Identificación</label>
                    <select class="form-select" name="cbx1" id="cbx1">
                        <option value="">Selecione un Tipo de Identificación</option>
                        <?php
                                    include('../Conection/bd.php');
                                    $consulta1='select * from tipo_identificacion;';
                                    $ejecutar1=mysqli_query($conn,$consulta1) or die(mysqli_error($conn));
                                ?>
                        <?php foreach($ejecutar1 as $opciones): ?>
                        <option id="<?php echo $opciones['id_tipoid']?>" value="<?php echo $opciones['id_tipoid']?>">
                            <?php echo $opciones['tipo_identificacion']?>
                        </option>
                        <?php endforeach ?>
                    </select>
                </div>
                <button type="submit" id="btn1" class="btn btn-success">Registrar Cliente</button>
            </form>
        </div>
    </div>
</div><br><br>
<div class="tbcliente">
    <div class="col-md-5 cli" id="contendortabla">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por Identificación"
            title="Digita una Variedad">
        <table class="table table-wrapper table-striped table-bordered table-lg" id="contendortabla2" cellspacing="0">
            <thead>
                <tr>
                    <th class="th-sm">Nombres</th>
                    <th class="th-sm">A. Paterno</th>
                    <th class="th-sm">A. Materno</th>
                    <th class="th-sm">Telefono</th>
                    <th class="th-sm">Correo</th>
                    <th class="th-sm">Identificación</th>
                    <th class="th-sm">Tipo Identificación</th>
                    <th class="th-sm">Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                            $query="select * from v_clienteNJ;";
                            $result=mysqli_query($conn,$query);
                            while($row = mysqli_fetch_array($result)){?>
                <tr>
                    <td><?php echo $row['Nombre']?></td>
                    <td><?php echo $row['APP']?></td>
                    <td><?php echo $row['APM']?></td>
                    <td><?php echo $row['Telefono']?></td>
                    <td class="correo"><?php echo $row['Correo']?></td>
                    <td><?php echo $row['Identificacion']?></td>
                    <td><?php echo $row['tipo_identificacion']?></td>
                    <td>
                        <a nom="<?php echo $row['Nombre']?>" ap="<?php echo $row['APP']?>" am="<?php echo $row['APM']?>"
                            tel="<?php echo $row['Telefono']?>" cor="<?php echo $row['Correo']?>"
                            identi="<?php echo $row['Identificacion']?>"
                            tipiden="<?php echo $row['tipo_identificacion']?>"
                            iddat="<?php echo $row['id_datosgenerales']?>" idcli="<?php echo $row['id_cliente']?>"
                            idtipiden="<?php echo $row['id_tipoid']?>" href="#" class="btn btn-secondary edit_cli"
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
        td = tr[i].getElementsByTagName("td")[5];
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

function idnt() {
    var txt = $('#txt6').val();
    console.log(txt.length);
    if (txt.length <= 8 & txt.length > 1) {
        document.getElementById('cbx1').value = '1'
    } else {
        document.getElementById('cbx1').value = '2'
    }
}
$('.edit_cli').click(function(e) {
    var idcl = $(this).attr('idcli');
    var nb = $(this).attr('nom');
    var paterno = $(this).attr('ap');
    var materno = $(this).attr('am');
    var corre = $(this).attr('cor');
    var tele = $(this).attr('tel');
    var iddg = $(this).attr('iddat');
    var idtpid = $(this).attr('idtipiden');
    var iden = $(this).attr('identi');
    var tipoiden = $(this).attr('tipiden');
    document.getElementById('t1').value = nb;
    document.getElementById('cbx1').value = idtpid;
    document.getElementById('t2').value = paterno;
    document.getElementById('t3').value = materno;
    document.getElementById('lbidcl').value = idcl;
    document.getElementById('lbiddg').value = iddg;
    document.getElementById('t4').value = corre;
    document.getElementById('t5').value = tele;
    document.getElementById('t6').value = iden;
    e.preventDefault();
});
</script>