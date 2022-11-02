<?php
    $conn = mysqli_connect(
        '34.151.225.212:3306',
        'sa',
        'Qxe"m{I#1ydn/NPC',
        'dbsisWebLirios'
        );
?>
<?php date_default_timezone_set('America/Lima'); ?>
<br><br>
<h2 style="text-align: center;">Estadisticas Generales</h2>
<br><br>
<div class="card"
    style="width:29% ; height: 300px; position:relative; left:6%; font-family: 'Times New Roman', Times, serif;">
    <div class="card-header" style="text-align: center;background-color:lightyellow;">
        Productos Vendidos del Día: <?php setlocale(LC_TIME, "spanish");
                                    echo utf8_decode(ucwords(strftime(" %A %d de %B del %Y"))); ?>
    </div>
    <div class="card-body" style="text-align: center;">
        <table class="table table-wrapper table-scroll">
            <thead>
                <tr class="column">
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Ganancia</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $cons="select * from v_proddiadet;";
                    $result=mysqli_query($conn,$cons);
                    while($row = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $row['prod'] ?></td>
                    <td><?php echo $row['cantVent'] ?></td>
                    <td style="text-align: center;"><?php echo $row['Ganancia'].' S/.' ?></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    <div class="card rest1">
        <center>
            <?php $cos="select ROUND(sum(Ganancia), 3) as 'total' from v_proddiadet;";
                  $result=mysqli_query($conn,$cos);
                  while($row = mysqli_fetch_array($result)){
            ?>
            <p>Total Ganado:
                <?php echo $row['total'].' S/.'?>
            </p>
            <?php }?>
        </center>
    </div>
</div>

<div class="card"
    style="width:27% ; height: 300px; position:absolute;top:28.4%; left:38%; font-family: 'Times New Roman', Times, serif;">
    <div class="card-header" style="text-align: center;background-color:lightgreen;">
        Top 3 Clientes del Mes: <?php setlocale(LC_TIME, "spanish"); echo ucwords(strftime("%B")); ?>
    </div>
    <div class="card-body" style="text-align: center;">
        <table class="table table-wrapper table-scroll">
            <thead>
                <tr class="column">
                    <th>Cliente</th>
                    <th>Importe Comprado</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $cons="select * from v_cli_top_n_j;";
                    $result=mysqli_query($conn,$cons);
                    while($row = mysqli_fetch_array($result)){
                ?>
                <tr style="text-align: center;">
                    <td><?php echo $row['NombresApellido'] ?></td>
                    <td><?php echo $row['Importecompra'] ?></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>

    <div class="card"
        style="width:100% ; height: 300px; position:absolute;top:-0.25%; left:110%; font-family: 'Times New Roman', Times, serif;">
        <div class="card-header" style="text-align: center;background-color:lightgray;">
            Variedades vendidas en el mes de: <select name="mes" id="mes">
                <option value="null">Seleccione un Mes....</option>
                <option value="January">Enero</option>
                <option value="February">Febrero</option>
                <option value="March">Marzo</option>
                <option value="April">Abril</option>
                <option value="May">Mayo</option>
                <option value="June">Junio</option>
                <option value="July">Julio</option>
                <option value="August">Agosto</option>
                <option value="September">Septiembre</option>
                <option value="October">Octubre</option>
                <option value="November">Noviembre</option>
                <option value="December">Diciembre</option>
            </select>
        </div>
        <div class="card-body tb">
        </div>
    </div>
    <br><br>
    <script>
    $('#mes').change(function() {
        $('.tb').html('');
        if ($('#mes').val() != 'null') {
            $.ajax({
                method: "GET",
                url: "includes/canva1.php",
                data: "meses=" + $('#mes').val(),
                success: function(e) {
                    $('.tb').html(e);
                    console.log(e);
                }
            });
        } else {
            $('.tb').html('');
        }
    });
    </script>
    <div class="card"
        style="width:100% ; height: 290px; position:absolute;top:109%; left:0%; font-family: 'Times New Roman', Times, serif;">
        <div class="card-header" style="text-align: center; background-color:lightsalmon;">
            Top 3 Empresas del Mes: <?php setlocale(LC_TIME, "spanish"); echo ucwords(strftime("%B")); ?>
        </div>
        <div class="card-body" style="text-align: center;">
            <table class="table table-wrapper table-scroll">
                <thead>
                    <tr class="column">
                        <th>Empresa</th>
                        <th>Importe Comprado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $cons="select * from v_cli_top_emp;";
                    $result=mysqli_query($conn,$cons);
                    while($row = mysqli_fetch_array($result)){
                ?>
                    <tr>
                        <td><?php echo $row['NombresApellido'] ?></td>
                        <td><?php echo $row['Importecompra'] ?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>