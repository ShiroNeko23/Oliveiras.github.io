<div class="frm2">

    <div class="container p-4" id="contenedorprincipal">
        <div class="row" id="formprincipal">
            <div class="col-md-4">
                <?php include('../Includes/alerta.php') ?>
                <div class="card card-body">
                    <form action="../Includes/insert.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Nombre de la Empresa</label>
                            <input type="text" name="t1" id="txt1" class="form-control"
                                placeholder="Ingrese Nombre de la Empresa">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ruc</label><br>
                            <input type="text" name="t2" id="txt2" class="form-control"
                                placeholder="Ingrese Ruc de la Empresa" maxlength="11">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Correo</label><br>
                            <input type="text" name="t3" id="txt3" class="form-control"
                                placeholder="Ingrese Correo de la Empresa" maxlength="100">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Telefono</label><br>
                            <input type="text" name="t4" id="txt4" class="form-control"
                                placeholder="Ingrese Correo de la Empresa" maxlength="9">
                        </div>
                        <button type="submit" class="btn btn-primary" name="btnrempresa">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container border" style="position: absolute; top: 100px; left: 500px;width: 615px;height: 100px;"><br>
    <div class="container" id="contendortabla">
        <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar RUC"
            title="Digita una Variedad"><br>
        <div class="container">
            <table class="table table-bordered" id="contendortabla2" cellspacing="0">
                <thead style="position: absolute;">
                    <tr>
                        <th style="width: 165px;">Empresa</th>
                        <th style="width: 110px;">Telefono</th>
                        <th style="width: 310px;">Correo</th>
                        <th style="width: 150px;">RUC</th>
                        <th style="width: 90px;">Editar</th>
                    </tr>
                </thead>
                <tbody style="position: absolute;
    overflow-y: auto;
    height: 200px;
    width: 600px;
    top: 154%;">
                    <?php 
                            $query="select * from vt_empresar;";
                            $result=mysqli_query($conn,$query);
                            while($row = mysqli_fetch_array($result)){?>
                    <tr>
                        <td style="width: 122px;"><?php echo $row['Empresa']?></td>
                        <td style="width: 95px;"><?php echo $row['Telefono']?></td>
                        <td style="width: 184px;"><?php echo $row['Correo']?></td>
                        <td style="width: 112px;"><?php echo $row['Identificacion']?></td>
                        <td style="width: 30px;">
                            <a empre="<?php echo $row['Empresa']?>" tele="<?php echo $row['Telefono']?>"
                                cor="<?php echo $row['Correo']?>" iden="<?php echo $row['Identificacion']?>"
                                codcli="<?php echo $row['id_cliente']?>" coddg="<?php echo $row['id_datosgenerales']?>"
                                href="#" class="btn btn-secondary edit_emp" data-bs-toggle="modal"
                                data-bs-target="#modalempresa">
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
        td = tr[i].getElementsByTagName("td")[3];
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
$('.edit_emp').click(function(e) {
    var idcl = $(this).attr('codcli');
    var nb = $(this).attr('empre');
    var corre = $(this).attr('cor');
    var tele = $(this).attr('tele');
    var iddg = $(this).attr('coddg');
    var iden = $(this).attr('iden');
    document.getElementById('t1').value = nb;
    document.getElementById('lbidcl').value = idcl;
    document.getElementById('lbiddg').value = iddg;
    document.getElementById('t4').value = corre;
    document.getElementById('t5').value = tele;
    document.getElementById('t6').value = iden;
    e.preventDefault();
});
</script>