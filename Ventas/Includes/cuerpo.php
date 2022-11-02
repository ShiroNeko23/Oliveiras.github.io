
<div class="container border">
    <div class="container"><br>
        <label >Codigo</label>
        <input type="text" class="incodigo" id="incodigo"  style="border-radius: 10px;" readonly="readonly">&nbsp;&nbsp;&nbsp;
        <label >Variedad</label><input type="text" class="invariedad"  id="invariedad" style="border-radius:10px;" readonly="readonly">&nbsp;&nbsp;&nbsp;
        <label >Calibre</label><input type="text" class="incalibre"  id="incalibre" style="border-radius:10px;" readonly="readonly">&nbsp;&nbsp;&nbsp;
        <label >Tipo</label><input type="text" class="tipo"  id="tipo" style="border-radius:10px;" readonly="readonly">
        <br><br><label >Precio</label><input type="text" class="inprecio"  id="inprecio" style="border-radius:10px;" readonly="readonly"><br><br>
        <label>Cantidad</label>
        <input type="text" class="incantidad"  id="incantidad" placeholder="Ingrese la cantidad" style="border-radius:10px;"><br><br>
        <button  class="btn btn-success btagregar" onclick='compf(event)'>Agregar</button><br><br>
    </div>
    <div>
        <table class="table table-dark" id="tablaproductos">
        <thead>
            <tr>
                <th scope="col">COD</th>
                <th scope="col">Variedad</th>
                <th scope="col">Tipo</th>
                <th scope="col">Calibre</th>
                <th scope="col">Cantidad</th>
                <th scope="col">P.Unitario</th>
                <th scope="col">Precio</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="cuerpotabla">
        </tbody>
        </table>
    </div>
    <div class="container border">
        <div class="container"><br>
            <label>Total</label><input readonly="readonly" id="invalor" class="invalor">&nbsp;<label>Destino</label><input type="text" id="indestino" class="indestino"><br><br>
            <label >Tipo de pago</label>
            <select class="form-select" name="cbtipopag" id="tipopag">
                        <option value="">Selecione...</option>
                        <?php
                                    include('../Conection/bd.php');
                                    $consulta1='select * from tipo_pago;';
                                    $ejecutar1=mysqli_query($conn,$consulta1) or die(mysqli_error($conn));
                                ?>
                        <?php foreach($ejecutar1 as $opciones): ?>
                        <option id="<?php echo $opciones['id_tipopago']?>" value="<?php echo $opciones['id_tipopago']?>">
                            <?php echo $opciones['tipo_pago']?>
                        </option>
                        <?php endforeach ?>
                    </select>
            <label >T. Comprobante</label>
            <select class="form-select" name="cbtipocom" id="tipocom">
                        <option value="">Selecione...</option>
                        <?php
                                    $consulta2='select * from tipo_comprobante;';
                                    $ejecutar2=mysqli_query($conn,$consulta2) or die(mysqli_error($conn));
                                ?>
                        <?php foreach($ejecutar2 as $opciones2): ?>
                        <option id="<?php echo $opciones2['id_tipocomprobante']?>" value="<?php echo $opciones2['id_tipocomprobante']?>">
                            <?php echo $opciones2['tipo_comprobante']?>
                        </option>
                        <?php endforeach ?>
                    </select>
            <button class="btn btn-success btsave" onclick="guardar()">Registrar venta</button>
        </div>
    </div>
</div>




<script>
    var cantidadfilas=0;
    var data=[];
    function agre(e){
    var iden=document.getElementById('incodigo').value;
    var canti=parseFloat(document.getElementById('incantidad').value);
    var variedad=document.getElementById('invariedad').value;
    var tipo=document.getElementById('tipo').value;
    var calibre=document.getElementById('incalibre').value;
    var puni=parseFloat(document.getElementById('inprecio').value);
    var precio=puni*canti;
    
    if(iden.length!=0 && canti.length!=0){
        data.push(
            {
            "id":cantidadfilas,
            "cod":iden,
            "variedad":variedad,
            "tp":tipo,
            "cal":calibre,
            "cant":canti,
            "puni":puni,
            "pre":precio
            }
        );
        var id_row='row'+cantidadfilas;
        var infofila='<tr id='+id_row+'><td>'+iden+'</td><td>'+variedad+'</td><td>'+tipo+'</td><td>'+calibre+'</td><td>'+canti+'</td><td>'+puni+'</td><td>'+precio+'</td>'+
        '<td><a href="#" class="btn btn-danger" onclick="eliminar('+cantidadfilas+')";>Eliminar</a><a href="#" class="btn btn-primary" onclick="cantidad('+cantidadfilas+')";>Cantidad</a></td></tr>';
            $("#tablaproductos").append(infofila);
            document.getElementById('incodigo').value="";
            document.getElementById('invariedad').value="";
            document.getElementById('incalibre').value="";
            document.getElementById('inprecio').value="";
            document.getElementById('incodigo').value="";
            document.getElementById('incantidad').value="";
            document.getElementById('tipo').value="";
            cantidadfilas++;
            sumar();
            e.preventDefault();            
}}
$('body').on('click', '#contendortabla2 tr', function () {
    var idtr = $(this).attr('id');
    document.getElementById('incodigo').value = document.getElementById('contendortabla2').tBodies[0].rows[idtr].cells[0].innerHTML;
    document.getElementById('invariedad').value = document.getElementById('contendortabla2').tBodies[0].rows[idtr].cells[1].innerHTML;
    document.getElementById('incalibre').value = document.getElementById('contendortabla2').tBodies[0].rows[idtr].cells[3].innerHTML;
    document.getElementById('inprecio').value = document.getElementById('contendortabla2').tBodies[0].rows[idtr].cells[5].innerHTML;
    document.getElementById('tipo').value = document.getElementById('contendortabla2').tBodies[0].rows[idtr].cells[2].innerHTML; 
    document.getElementById('incantidad').focus();
})

function compf(ev){
        if((document.getElementById('incantidad').value.length)!=0 && (document.getElementById('incodigo').value.length)!=0){
        var contador=0;
        var rowCount = $("#tablaproductos tr").length;
        if(rowCount>=2){
            for(x of data){
                if(x.cod==document.getElementById('incodigo').value){
                    contador++;
                }
            }
            
            if(contador==0){
                agre(ev);
                contador=0;
            }
            if(contador>0){
                alert('Este producto ya esta en la lista');
            }
        }
        else{
            agre(ev);
        }
        console.log(contador);
    }
    else{
        alert('Ingrese un producto y cantidad')
    }
}
function eliminar(row){
    $("#row"+row).remove();
    var i=0;
    var posision=0;
    for(arreglo of data){
        if(arreglo.id==row){
            pos=i;

        }
        i++;
    }
    data.splice(pos,1);
    sumar();

}
function cantidad(row){
    var ncan=parseFloat(prompt("Nueva cantidad"));
    data[row].cant=ncan;
    data[row].pre=data[row].cant*data[row].puni;
    var filaid=document.getElementById("row"+row);
    celda=filaid.getElementsByTagName('td');
    celda[4].innerHTML=ncan;
    celda[6].innerHTML=data[row].pre;
    sumar();
}
function sumar(){
            var tot=0;
            for(arreglo of data){
            tot=tot+arreglo.pre;
            }
            document.getElementById('invalor').value=tot;
            
}
function guardar(){
    var rowCount2 = $("#tablaproductos tr").length;
    var nomcli =document.getElementById('identi').value;
    var destin =document.getElementById('indestino').value;
    var monton=document.getElementById('invalor').value;
    var idtipp=document.getElementById('tipopag').value;
    var idtipcom=document.getElementById('tipocom').value;
    var ruta1="cli="+nomcli+"&des="+destin+"&monto="+monton+"&idtipp="+idtipp+"&idtipcom="+idtipcom;
    $.ajax({
        type: "POST",
        url: "inventa.php",
        data: ruta1,
        success: function (response) {
            console.log(response);
        }
    });
    
    for(var i=0;i<rowCount2-1;i++){
        var ruta2="idpro="+document.getElementById('tablaproductos').tBodies[0].rows[i].cells[0].innerHTML+"&canti="+document.getElementById('tablaproductos').tBodies[0].rows[i].cells[4].innerHTML;
        $.ajax({
            type: "POST",
            url: "inpv.php",
            data: ruta2,
            success: function (response2) {
                console.log('Respuesta'+response2);
            }
        });
    }
    location.reload();
}
</script>

